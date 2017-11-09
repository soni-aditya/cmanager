<?php
$file = $theme['folder'] . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'sidebar-menu.ctp';

if (!file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {

    $loguser = $this->request->session()->read('Auth.User');

//debug($loguser);

    $menus = $loguser['menus'];
    ?>
    <ul class="sidebar-menu">
        <?php
        foreach ($menus as $menu): {

            if (count($menu['children']) == 0) {
                echo '<li><a href="' . $this->Url->build(''. $menu['url'] ) . '">
                            <span>' . $menu['name'] . '</span><i class="ion ion-pound pull-left text-aqua"></i>
                        </a></li>';
            } else {

                echo '<li class="treeview">' .
                    '<a href="#">' .
                    '<span>' . $menu['name'] . '</span><i class="ion ion-pound pull-left text-danger"></i> <i class="fa fa-angle-left pull-right"></i>' .
                    '</a>' .
                    '<ul class="treeview-menu">';

                foreach ($menu['children'] as $menu): {
                    echo '<li><a href="' . $this->Url->build(''. $menu['url'] ) . '"><i class="fa fa-circle-o text-aqua"></i> ' . $menu['name'] . '</a></li>';
                }
                endforeach;

                echo '</ul>' .
                    '</li>';
            }
        }
        endforeach;

//        function createMenus($menu){
//            if (count($menu['children']) == 0) {
//                echo '<li><a href="' . $this->Url->build(''. $menu['url'] ) . '"><i class="fa  fa-dashboard"></i> <span>' . $menu['name'] . '</span></a></li>';
//            } else {
//
//                echo '<li class="treeview">' .
//                    '<a href="#">' .
//                    '<i class="fa fa-dashboard"></i> <span>' . $menu['name'] . '</span> <i class="fa fa-angle-left pull-right"></i>' .
//                    '</a>' .
//                    '<ul class="treeview-menu">';
//
//                foreach ($menu['children'] as $menu): {
//                    echo '<li><a href="' . $this->Url->build(''. $menu['url'] ) . '"><i class="fa fa-circle-o"></i> ' . $menu['name'] . '</a></li>';
//                }
//                endforeach;
//
//                echo '</ul>' .
//                    '</li>';
//            }
//        }
        ?>
    </ul>
<?php } ?>
