<?php $info = $data[0]; ?>

<form class="p-3">
  <div class="mb-3">
    <label class="form-label">아이디</label>
    <span class="badge rounded-pill text-bg-danger">아이디는 수정하실 수 없습니다.</span>
    <input type="text" class="form-control" value="<?= $info['user_id'] ?>" disabled>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">비밀번호</label>
    <span class="badge rounded-pill text-bg-secondary cursor-pointer" onclick="onready()">변경하기</span>
    <input type="password" class="form-control"  disabled>
  </div>
  <div class="mb-3">
    <label class="form-label">이름</label>
    <span class="badge rounded-pill text-bg-secondary cursor-pointer" onclick="onready()">변경하기</span>
    <input type="text" class="form-control" value="<?= $info['user_name'] ?>"  disabled>
  </div>
</form> 
