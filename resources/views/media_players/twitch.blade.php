<script src="https://embed.twitch.tv/embed/v1.js"></script>
<?php
$media_type = 'stream';
$media_id = $post->media_id;
//dd($media_id);


if ($media_type == 'stream') {
    echo '<iframe class="media_player" frameborder="0" allowfullscreen
                                src="https://player.twitch.tv/?channel=' . $media_id . '&parent=www.example.com"></iframe>';
} else {
    echo '<iframe class="media_player" src="https://player.twitch.tv/?autoplay=true&video=' . $media_id . '"frameborder="0" allowfullscreen="true" scrolling="no"></iframe>';
}
?>
