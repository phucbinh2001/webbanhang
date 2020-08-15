
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
            <a class="navbar-brand" href="javascript:;">QUẢN LÍ TÁC GIẢ</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-conthols="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <!-- <div class="collapse navbar-collapse justify-content-end" id="navigation">
              <form>
              <div class="input class="form-control"-group no-border">
                <input class="form-control" type="text" value="" class="form-conthol" placeholder="Search...">
                <div class="input class="form-control"-group-append">
                  <div class="input class="form-control"-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form> 
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
          </div> -->
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <?php
                if (isset($_GET['idedit'])&&($_GET['idedit'])>0) {
            ?>
                <form class="bang" action="admin.php?act=qltg" method="POST" enctype="multipart/form-data">
                    <input class="form-control" type="text" name="name" id="" placeholder="Tên tác giả" value="<?=$chitiettg['name']?>">   
                    <input type="hidden" name="id" value="<?=$chitiettg['id']?>">
                    <input class="btn btn-primary btn-round" id="mauxanh" type="submit" value="Cập nhật" name="edit">
                </form>
            <?php 
                }else{
            ?>
            <form class="bang" action="admin.php?act=qltg" method="POST" enctype="multipart/form-data">
                <input class="form-control" type="text" name="name" id="" placeholder="Tên danh mục">
                <input class="btn btn-primary btn-round" id="mauxanh" type="submit" value="Thêm" name="submit">
            </form>
            <?php
            };
            ?>
            <table class="table">
                <tr>
                    <thead class=" text-primary">
                        <th  id="chuxanh">Id</th>
                        <th  id="chuxanh">Danh mục</th>
                        <th  id="chuxanh">Sửa</th>
                        <th  id="chuxanh">Xóa</th>
                    </thead>
                </tr>
                <?php
                    foreach ($tacgia as $tg) {
                        $id = $tg['id'];
                        $tentg = $tg['name'];
                        $linkdel = "admin.php?act=qltg&iddel=".$id;
                        $linkedit = "admin.php?act=qltg&idedit=".$id;
                        echo'
                        <tr>
                            <td>'.$id.'</td>
                            <td>'.$tentg.'</td>
                            <td><a href="'.$linkedit.'">Sửa</a></td>
                            <td><a href="'.$linkdel.'"><i class="nc-icon nc-simple-remove"></i></a></td>
                        </tr>';
                    }    
                ?>
            </table>
          </div>
        </div>
      </div>
 