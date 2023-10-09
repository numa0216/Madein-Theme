<?php get_header(); ?>

<?php
// アーカイブするカスタム投稿のスラッグ名を取得する
$post_name = $post->post_name;
// カスタム投稿に応じたテンプレートを出力する
get_template_part('templates/page/page', $post_name);
?>

<?php get_footer(); ?>