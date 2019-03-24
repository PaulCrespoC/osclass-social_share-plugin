<?php
$values = json_decode(osc_get_preference('social_share_active_links'));
?>
    <style>
        .admin-settings .admin-header {
            border: 1px solid #435da78f;
            color: #f9f9f9;
            background-color: #38598b;
        }
        .admin-settings .admin-header h2 {
            font-size: 22px;
            font-weight: bold;
            width: 100%;
            text-align: center;
        }
        .admin-settings .admin-header p {
            font-size: 16px;
            font-weight: lighter;
            text-align: center;
        }
        .admin-settings .admin-header .admin-nav {
            list-style: none;
            display: flex;
            padding: 0;
            min-width: 250px;
            min-height: 30px;
            text-align: center;
        }
        .admin-settings .admin-header .admin-nav .admin-nav-option {
            margin-left: auto;
            margin-right: auto;
            border-bottom: 5px solid #113f67;
        }
        .admin-settings .admin-header .admin-nav .admin-nav-option a {
            text-decoration: none;
            color: #e7eaf6;
            font-size: 17px;
            font-weight: bolder;
            text-align: center;
        }
        .admin-settings .admin-content {
            border: 1px solid #9c9da073;
            background-color: #e7eaf6;
            color: black;
            padding: 15px;
        }
        .admin-settings .admin-content form {
            text-align: center;
        }
        .admin-settings .admin-content .admin-label {
            font-size: 16px;
            font-weight: 200;
        }
        .admin-settings .admin-content .admin-checkbox {
            border: 1px solid black;
        }
        .admin-settings .admin-content button {
            background-color: #38598b;
            padding: 5px;
            width: 60px;
            height: 20px;
            border-radius: 5px;
            border: 1px solid #557098;
            box-sizing: content-box;
            color: #efefef;
        }
        .admin-settings .admin-content button:hover {
            background-color: #4976b9;
            border: 1px solid #80a2d4;
            color: #f1e6e6;
            cursor: pointer;
        }
    </style>
    <div class="admin-settings">

        <div class="admin-header">
            <h2><?php echo __('Social Share Plugin Settings') ?></h2>
            <p><?php echo __('Here you can customize the admin share buttons that will appear in the item section!') ?></p>
            <ul class="admin-nav">
                <li class="admin-nav-option">
                    <a href="#"><span><?php echo __('Basic Settings') ?></span></a>
                </li>
            </ul>
        </div>

        <div class="admin-content">
            <form method="POST" action="<?php echo osc_route_admin_url('social_share_post') ?>">
                <?php
                foreach ($values as $key => $value) {
                    ?>
                    <label class="admin-label">
                        <span><?php echo $key ?></span>
                        <input class="admin-checkbox" type="checkbox" name="<?php echo $key ?>" <?php if ($value == 'on') {echo 'checked="on"';} ?>>
                    </label>
                    <br><br>
                    <?php
                }
                ?>
                <button type="submit" class="admin-submit"><?php echo __('Save') ?></button>
            </form>
        </div>

    </div>
<?php
