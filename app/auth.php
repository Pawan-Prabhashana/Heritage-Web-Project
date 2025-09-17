<?php
class Auth {
  public static function hash($p){ return password_hash($p, PASSWORD_BCRYPT); }
  public static function check($p,$h){ return password_verify($p,$h); }
  public static function user(){ return $_SESSION['user'] ?? null; }
  public static function login($u){ $_SESSION['user']=$u; }
  public static function logout(){ unset($_SESSION['user']); }
  public static function requireRole($roles){ $u=self::user(); if(!$u || !in_array($u['role'],$roles,true)) json_response(['ok'=>false,'error'=>'unauthorized'],401); }
}
