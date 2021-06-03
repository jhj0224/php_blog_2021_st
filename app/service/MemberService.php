<?php
class APP__MemberService {
  private APP__MemberRepository $memberRepository;

  public function __construct() {
    global $App__memberRepository;
    $this->memberRepository = $App__memberRepository;
  }

  public function getForPrintMemberByLoginIdAndLoginPw(string $loginId, string $loginPw): array|null {
    return $this->memberRepository->getForPrintMemberByLoginIdAndLoginPw($loginId, $loginPw);
  }

  public function getForPrintMemberById(int $id): array|null {
    return $this->memberRepository->getForPrintMemberById($id);
  }
  public function getForPrintMemberByJoin(string $loginId, string $loginPw, string $name, string $nickname, string $cellphoneNo, string $email): array|null {
    return $this->memberRepository->getForPrintMemberByJoin($loginId, $loginPw, $name, $nickname, $cellphoneNo, $email);
  }
}