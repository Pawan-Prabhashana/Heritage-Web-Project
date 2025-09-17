<?php
function json_response($data=[], int $code=200){ http_response_code($code); header('Content-Type: application/json; charset=utf-8'); echo json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES); exit; }
function input_json(){ $raw=file_get_contents('php:
function require_fields(array $p,array $req){ $miss=[]; foreach($req as $k){ if(!isset($p[$k])||$p[$k]==='') $miss[]=$k;} if($miss){ json_response(['ok'=>false,'error'=>'missing_fields','fields'=>$miss],422);} }
function now(){ return date('Y-m-d H:i:s'); }
function slugify($t){ $t=preg_replace('~[^\pL\d]+~u','-',$t); $t=iconv('utf-8','us-ascii
function ensure_dir($p){ if(!is_dir($p)) mkdir($p,0775,true); }
