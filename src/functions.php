<?php

add_action('after_setup_theme', function () {
    register_nav_menus(array( //複数のナビゲーションメニューを登録する関数
        //'「メニューの位置」の識別子' => 'メニューの説明の文字列',
        'main-menu' => 'Main Menu',
        'footer-menu'  => 'Footer Menu',
    ));
});

add_action('wp_enqueue_scripts',   function () {
    wp_enqueue_script(
        'main_script',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        'false',
        'false'
    );

    if (is_front_page() || is_home()) {
        wp_enqueue_script(
            'top_script',
            get_template_directory_uri() . '/assets/js/top.js',
            array(),
            'false',
            'false'
        );
    } elseif (is_page('flow')) {
        wp_enqueue_script(
            'flow_script',
            get_template_directory_uri() . '/assets/js/flow.js',
            array(),
            'false',
            'false'
        );
    } elseif (is_archive() || is_singular()) {
        wp_enqueue_script(
            'archive_script',
            get_template_directory_uri() . '/assets/js/archive.js',
            array(),
            'false',
            'false'
        );
    }

    wp_enqueue_style(
        'main',
        get_template_directory_uri() . '/style.css',
        "",
        '20160608'
    );
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js', array(), '3.11.5', false);
    wp_enqueue_script('scrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/ScrollTrigger.min.js', array(), '3.11.5', false);
    wp_enqueue_script('split-type', 'https://unpkg.com/split-type', array(), '0.3.4', false);
});

/**
 * 管理画面に追加のメニューの作成
 */
class AddAdminMenu
{
    public string $setting_slug;
    public string $page_title;
    public string $menu_title;
    const capability = 'manage_options';

    /**
     * 「設定」にメニューを追加
     */
    public function my_add_admin_menu()
    {
        add_menu_page(
            $this->page_title,
            $this->menu_title,
            self::capability,
            $this->setting_slug,
            array($this, 'form_settings_page'),
            '',
            3,
        );
    }

    /**
     * メニューページの中身を作成
     */
    public function form_settings_page()
    {
        if (!current_user_can(self::capability)) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }
?>
        <div class="wrap">
            <h1><?php echo esc_html($this->page_title); ?></h1>
            <form method="POST" action="options.php">
                <?php
                settings_fields($this->setting_slug); // ページのスラッグ.
                do_settings_sections($this->setting_slug);  // ページのスラッグ.
                submit_button();
                ?>
            </form>
        </div>
    <?php
    }
}

/**
 * contact form 7 対応したフォームの設定画面(contact form 7 サブメニューに作成)
 */
class AddAdminMenuSNS extends AddAdminMenu
{
    const sns_section = 'sns-settings-section';
    const toppage_section = 'toppage-settings-section';

    /**
     * __construct
     *
     * @return void
     */
    public function __construct($title)
    {
        $this->setting_slug = 'sns_settings';
        $this->menu_title = '設定';
        $this->page_title = $title;
        add_action('admin_menu', array($this, 'my_add_admin_menu'));
        add_action('admin_init',  array($this, 'my_init_original_settings'));
    }

    /**
     * 設定項目の準備
     */
    public function my_init_original_settings()
    {
        add_action('admin_print_scripts', function () {
            wp_enqueue_media();
        });
        $this->settings_section();
        $this->settings_field();
    }

    /**
     * 設定セクションの追加
     *
     * @return void
     */
    private function settings_section()
    {
        // 設定のセクション追加
        add_settings_section(
            self::sns_section,
            'SNS URL', // ラベル
            array($this, 'sns_url_info'), // セクションの説明文を表示するための関数.
            $this->setting_slug,
        );
        // 設定のセクション追加
        add_settings_section(
            self::toppage_section,
            'TOPページ バブル設定', // ラベル
            array($this, 'top_image_info'), // セクションの説明文を表示するための関数.
            $this->setting_slug,
        );
    }

    /**
     * 設定フィールドの追加
     *
     * @return void
     */
    private function settings_field()
    {
        $this->settings_field_sns('sns_youtube_url', 'youtube');
        $this->settings_field_sns('sns_instagram_url', 'instagram');
        $this->settings_field_sns('sns_twitter_url', 'twitter (X)');
        for ($i = 1; $i < 10; $i++) {
            $this->settings_field_toppage("toppage_url_{$i}_img", "toppage_{$i}_img", "toppage_url_{$i}_text", "toppage_{$i}_text");
        }
    }

    /**
     * SNSの設定の追加
     *
     * @param string $name 設定名
     * @param string $label 表示ラベル
     * @return void
     */
    private function settings_field_sns($name, $label)
    {
        // 設定項目の追加.
        add_settings_field(
            $name, // 設定名.
            $label, // 設定タイトル.
            array($this, 'sns_url_input'), // 設定項目のHTMLを出力する関数名.
            $this->setting_slug, // メニュースラッグ.
            self::sns_section, // どのセクションに表示するか.
            array(
                'label' => $name,
            )
        );
        // 設定の登録
        register_setting(
            $this->setting_slug,
            $name,
            [
                'sanitize_callback' => 'esc_url_raw',
            ]
        );
    }

    private function settings_field_toppage($img_name, $img_label, $text_name, $text_label)
    {
        // 設定項目の追加.
        add_settings_field(
            $img_name, // 設定名.
            $img_label, // 設定タイトル.
            array($this, 'top_image_input'), // 設定項目のHTMLを出力する関数名.
            $this->setting_slug, // メニュースラッグ.
            self::toppage_section, // どのセクションに表示するか.
            array(
                'label' => $img_name,
            )
        );
        // 設定の登録
        register_setting(
            $this->setting_slug,
            $img_name,
        );

        // 設定項目の追加.
        add_settings_field(
            $text_name, // 設定名.
            $text_label, // 設定タイトル.
            array($this, 'top_text_input'), // 設定項目のHTMLを出力する関数名.
            $this->setting_slug, // メニュースラッグ.
            self::toppage_section, // どのセクションに表示するか.
            array(
                'label' => $text_name,
            )
        );
        // 設定の登録
        register_setting(
            $this->setting_slug,
            $text_name,
            [
                'sanitize_callback' => 'sanitize_text_field',
            ]
        );
    }

    /**
     * セクションの説明文を表示するための関数
     */
    public function sns_url_info()
    {
        echo '<p>それぞれのSNSのURLを入力して下さい。</p>';
    }
    /**
     * セクションの説明文を表示するための関数
     */
    public function top_image_info()
    {
        echo '
        <p>トップページのテキスト、または画像を選択してください。</p>
        <p>※画像を選択しない場合はテキストが出力されます。
        ';
    }

    /**
     * フォーム設定項目表示用関数
     */
    public function sns_url_input($args)
    { ?>
        <input type="text" name="<?php echo $args['label']; ?>" value="<?php echo get_option($args['label']); ?>">
    <?php
    }

    /**
     * TOPページ画像の設定
     */
    public function top_image_input($args)
    {
        $this->generate_upload_image_tag($args['label'], get_option($args['label']));
    }
    /**
     * TOPページテキストの設定
     */
    public function top_text_input($args)
    {
    ?>
        <input type="text" name="<?php echo $args['label']; ?>" value="<?php echo get_option($args['label']); ?>">
    <?php
    }

    /**
     * ファイルアップローダー出力関数
     */
    private function generate_upload_image_tag($name, $value)
    { ?>
        <input name="<?php echo $name; ?>" type="text" value="<?php echo $value; ?>" />
        <input type="button" name="<?php echo $name; ?>_slect" value="選択" />
        <input type="button" name="<?php echo $name; ?>_clear" value="クリア" />
        <div id="<?php echo $name; ?>_thumbnail" class="uploded-thumbnail">
            <?php
            if ($value) {
                $value_id = attachment_url_to_postid($value);
                $value_url = wp_get_attachment_image_src($value_id, 'thumbnail');
                echo '<p><img src="' .  $value_url[0] . '" alt="選択中の画像"></p>';
            }
            ?>
        </div>
        <script type="text/javascript">
            (function($) {
                var custom_uploader;
                $("input:button[name=<?php echo $name; ?>_slect]").click(function(e) {
                    e.preventDefault();
                    if (custom_uploader) {
                        custom_uploader.open();
                        return;
                    }
                    custom_uploader = wp.media({
                        title: "画像を選択してください",
                        /* ライブラリの一覧を画像のみにする */
                        library: {
                            type: "image"
                        },
                        button: {
                            text: "画像の選択"
                        },
                        /* 複数選択 */
                        multiple: false
                    });
                    custom_uploader.on("select", function() {
                        var images = custom_uploader.state().get("selection");
                        /* file の中に選択された画像の各種情報が入っている */
                        images.each(function(file) {
                            /* テキストフォームと表示されたサムネイル画像があればクリア */
                            $("input:text[name=<?php echo $name; ?>]").val("");
                            $("#<?php echo $name; ?>_thumbnail").empty();
                            /* テキストフォームに画像の URL を表示 */
                            $("input:text[name=<?php echo $name; ?>]").val(file.attributes.sizes.full.url);
                            /* プレビュー用に選択されたサムネイル画像を表示 */
                            $("#<?php echo $name; ?>_thumbnail").append('<img src="' + file.attributes.sizes.thumbnail.url + '" />');
                        });
                    });
                    custom_uploader.open();
                });
                /* クリアボタンを押した時の処理 */
                $("input:button[name=<?php echo $name; ?>_clear]").click(function() {
                    $("input:text[name=<?php echo $name; ?>]").val("");
                    $("#<?php echo $name; ?>_thumbnail").empty();
                });
            })(jQuery);
        </script>
<?php
    }
}

new AddAdminMenuSNS('設定ページ');
