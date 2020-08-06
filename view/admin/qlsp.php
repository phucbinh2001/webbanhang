
    <div class="main-panel" style="height: 100vh;">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-thansparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">QUẢN LÍ SẢN PHẨM</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-conthols="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <!-- <form>
              <div class="input class="form-control"-group no-border">
                <input class="form-control" type="text" value="" class="form-conthol" placeholder="Search...">
                <div class="input class="form-control"-group-append">
                  <div class="input class="form-control"-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form> -->
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="thue" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <?php
              if (isset($_GET['editid'])&&($_GET['editid'])>0) {
                $img = $pathimg.$spct['img'];
            ?>
            <form class="bang" action="admin.php?act=qlsp" method="POST" enctype="multipart/form-data">
                <input class="form-control" type="text" name="name" id="" placeholder="Tên sản phẩm" value="<?=$spct['name']?>">
                <input class="form-control" type="number" name="price" id="" placeholder="Giá" value="<?=$spct['price']?>">
                <input class="form-control" type="file" name="img" id="">
                <img src="<?=$img?>" alt="" width="100px">
                <br>
                <select class="form-control" name="dm" id="">
                  <?php
                      foreach ($danhmuc as $dm) {
                          $tendm = $dm['name'];
                          $iddm = $dm['id'];
                          if($dm['id']==$spct['iddm'])
                            $flag = "selected";
                          else
                            $flag = "";
                          echo '<option '.$flag.' value="'.$iddm.'">'.$tendm.'</option>';
                      }
                  ?>
                </select>
                <select class="form-control"name="tg" id="">
                  <?php
                    foreach ($showtg as $tg) {
                      $tentg = $tg['name'];
                      $idtacgia = $tg['id'];
                      if($tg['id']==$spct['idtacgia'])
                            $flag = "selected";
                          else
                            $flag = "";
                      echo '<option '.$flag.' value="'.$idtacgia.'">'.$tentg.'</option>';
                    }
                  ?>
                </select>
                <input class="form-control" type="hidden" name="idsp" value="<?=$spct['id']?>">
                <input class="btn btn-primary btn-round" type="submit" value="Cập nhật" name="update">
            </form>
            <?php
              }else{
            ?>
            <form class="bang" action="admin.php?act=qlsp" method="POST" enctype="multipart/form-data">
                <input class="form-control" type="text" name="name" id="" placeholder="Tên sản phẩm">
                <input class="form-control" type="number" name="price" id="" placeholder="Giá">
                <input class="form-control" type="file" name="img" id="">
                <select class="form-control"name="dm" id="">
                  <?php
                      foreach ($danhmuc as $dm) {
                          $tendm = $dm['name'];
                          $iddm = $dm['id'];
                          echo '<option value="'.$iddm.'">'.$tendm.'</option>';
                      }
                  ?>
                </select>
                <select class="form-control"name="tg" id="">
                  <?php
                    foreach ($showtg as $tg) {
                      $tentg = $tg['name'];
                      $idtacgia = $tg['id'];
                      echo '<option value="'.$idtacgia.'">'.$tentg.'</option>';
                    }
                  ?>
                </select>
                <input class="btn btn-primary btn-round" type="submit" value="Thêm" name="submit">
            </form><?php } ?>
            <table class="table">
                <tr>
                <thead class=" text-primary">
                    <th>Id</th>
                    <th>Danh mục</th>
                    <th>Tác giả</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Hot</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </thead>
                </tr>
                <?php
                    foreach ($sanpham as $sp) {
                        $id = $sp['id'];
                        $linkedit = "admin.php?act=qlsp&editid=".$id;
                        $linkdel = "admin.php?act=qlsp&delid=".$id;
                        $price = $sp['price'];
                        $hot = $sp['hot'];
                        $link = "index.php?act=productDetail&id=".$sp['id'];
                        $name = $sp['name'];
                        $vote = $sp['vote'];
                        $view = $sp['view'];
                        $idtacgia = $sp['idtacgia'];
                        $tacgia = shownametg($idtacgia);
                        $tacgia = $tacgia['name'];
                        $iddm = $sp['iddm'];
                        $danhmuc = shownamedm($iddm);
                        $danhmuc = $danhmuc['name'];
                        $img = $pathimg.$sp['img'];
                        if (is_file($img)) $img = '<img src="'.$img.'">';
                        else $img = '<img src="'.$pathimg.'404.jpg">';  
                        echo'
                        <tr>
                            <td>'.$id.'</td>
                            <td>'.$danhmuc.'</td>
                            <td>'.$tacgia.'</td>
                            <td>'.$name.'</td>
                            <td>'.$img.'</td>
                            <td> $'.$price.'</td>
                            <td>'.$hot.'</td>
                            <td><a href="'.$linkedit.'">Sửa</a></td>
                            <td><a href="'.$linkdel.'"><i class="nc-icon nc-simple-remove"></i></a></td>
                        </tr>';
                    }    
                ?>
            </table>
          </div>
        </div>
      </div>
 