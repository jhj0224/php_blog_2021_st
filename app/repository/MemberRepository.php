<?php
class APP__MemberRepository {
  public function getForPrintMemberByLoginIdAndLoginPw(string $loginId, string $loginPw): array|null {
    $sql = DB__secSql();
    $sql->add("SELECT *");
    $sql->add("FROM `member` AS M");
    $sql->add("WHERE M.loginId = ?", $loginId);
    $sql->add("AND M.loginPw = ?", $loginPw);
    
    return DB__getRow($sql);
  }

  public function getForPrintMemberById(int $id): array|null {
    $sql = DB__secSql();
    $sql->add("SELECT M.*");
    $sql->add("FROM `member` AS M");
    $sql->add("WHERE M.id = ?", $id);
    return DB__getRow($sql);
  }

  public function getForPrintMemberByJoin(string $loginId, string $loginPw, string $name, string $nickname, string $cellphoneNo, string $email): array|null {
    $sql = DB__secSql();
    $sql->add("INSERT INTO member");
    $sql->add("SET regDate = NOW()");
    $sql->add(", updateDate = NOW()");
    $sql->add(", loginId = ?", $loginId);
    $sql->add(", loginPw = ?", $loginPw);
    $sql->add(", name = ?", $name);
    $sql->add(", nickname = ?", $nickname);
    $sql->add(", cellphoneNo = ?", $cellphoneNo);
    $sql->add(", email = ?", $email);

    $loginId = DB__insert($sql);
    
    return $loginId;
    
  }
}