<fieldset class="fbox cent" style="width:500px">
  <legend>會員註冊</legend>
  <table class="tsb">
    <tr>
      <td colspan="2" style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</td>
    </tr>
    <tr>
      <td width="250px" class="clo">Step1:登入帳號</td>
      <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
      <td class="clo">Step2:登入密碼</td>
      <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
      <td class="clo">Step3:再次確認密碼</td>
      <td><input type="password" name="pw2" id="pw2"></td>
    </tr>
    <tr>
      <td class="clo">Step4:信箱(忘記密碼時使用)</td>
      <td><input type="text" name="email" id="email"></td>
    </tr>
    <tr>
      <td colspan="2">
        <button onclick="reg()">註冊</button>
        <button onclick="javascript:$('input[type=text],input[type=password]').val('')">清除</button>
    </td>
  </table>
</fieldset>
<script>
function reg(){
  let acc=$("#acc").val();
  let pw=$("#pw").val();
  let pw2=$("#pw2").val();
  let email=$("#email").val();
  if(acc=="" || pw=="" || pw2=="" || email==""){
    alert("不可空白");
  }else{
    $.post("api.php?do=chkAcc",{acc},function(back){
      if(back==1){
        alert("帳號重覆");
      }else{
        $.post("api.php?do=reg",{acc,pw,email},function(){
          alert("註冊完成，歡迎加入")
          lof("index.php?do=login");
        })
      }
    })
  }
}
</script>