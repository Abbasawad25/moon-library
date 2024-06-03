<?php require_once 'mailHeader.php'?>
        <?php
        if($page == 'inbox.php'){
            require_once 'inbox-body.php';
        }elseif ($page == 'draft.php'){
            require_once 'draft.php';
        }
        elseif ($page == 'sentmail1.php'){
            require_once 'sentmail1.php';
        }
        elseif ($page == 'trash.php'){
            require_once 'trash.php';
        }
        else{
            echo $page;
        }
        ?>
    </aside>
</div>
<?php require_once 'footer.php' ?>
