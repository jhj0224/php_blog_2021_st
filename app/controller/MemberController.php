<?php
class APP__UsrMemberController {
  private APP__MemberService $memberService;

  public function __construct() {
    global $App__memberService;
    $this->memberService = $App__memberService;
  }

  public function actionShowLogin() {
    require_once App__getViewPath("usr/member/login");
  }

  public function actionDoLogout() {
    unset($_SESSION['loginedMemberId']);
    jsLocationReplaceExit("../article/list.php", "로그아웃되었습니다.");
  }

  public function actionDoLogin() {
    if ( isset($_GET['loginId']) == false ) {
      echo "loginId를 입력해주세요.";
      exit;
    }
    
    if ( isset($_GET['loginPw']) == false ) {
      echo "loginPw를 입력해주세요.";
      exit;
    }
    
    $loginId = $_GET['loginId'];
    $loginPw = $_GET['loginPw'];
    
    $member = $this->memberService->getForPrintMemberByLoginIdAndLoginPw($loginId, $loginPw);
    
    if ( empty($member) ) {
      jsHistoryBackExit("일치하는 회원이 존재하지 않습니다.");
    }
    
    $_SESSION['loginedMemberId'] = $member['id'];
    
    jsLocationReplaceExit("../article/list.php", "{$member['nickname']}님 환영합니다.");    
  }
  
  public function actionShowJoin() {
    require_once App__getViewPath("usr/member/join");
  }

  public function actionDoJoin() {      
    $loginId = getStrValueOr($_REQUEST['loginId'], "");
    $oldMember = $this->memberService->getForPrintMemberByLoginId($loginId);

    if ( $oldMember != null ) {
      jsHistoryBackExit("이미 사용중인 로그인 아이디 입니다.");
    }

    $loginPw = getStrValueOr($_REQUEST['loginPw'], "");

    $name = getStrValueOr($_REQUEST['name'], "");
    $nickname = getStrValueOr($_REQUEST['nickname'], "");
    $cellphoneNo = getStrValueOr($_REQUEST['cellphoneNo'], "");
    $email = getStrValueOr($_REQUEST['email'], "");
    
    $id = $this->memberService->join($loginId, $loginPw, $name, $nickname, $cellphoneNo, $email);
               
    jsLocationReplaceExit("../article/list.php", "{$nickname}님 환영합니다.");    
  }
}