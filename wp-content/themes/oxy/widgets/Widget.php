<?php
class YoutubeWidget extends WP_Widget {

	public function __construct()
	{
		parent::__construct('youtube_widget', 'Youtube Widget');
	}

	public function widget($args, $instance) {
		echo $args['before_widget'];
		if(isset($instance['title'])) {
			$title = apply_filters('widget_title', $instance['title']);
			echo $args['before_title'] . $title . $args['after_title'];
		}
		$youtube = isset($instance['youtube']) ? $instance['youtube'] : '';
		echo '<div class="embed-responsive embed-responsive-16by9"><iframe  class="embed-responsive-item" src="https://www.youtube.com/embed/' . esc_attr($youtube) . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
		echo $args['after_widget'];
	}

	public function form ($instance) {
		$title = isset($instance['title']) ? $instance['title'] : '';
		$youtube = isset($instance['youtube']) ? $instance['youtube'] : '';
		?>
		<p>
		<label for="<?= $this->get_field_id('title') ?>">Titre</label>
		<input
			class="widefat"
			type="text"
			name="<?= $this->get_field_name('title') ?>"
			value="<?= esc_attr($title) ?>"
			id="<?= $this->get_field_name('title') ?>">
		</p>
		<p>
		<label for="<?= $this->get_field_id('youtube') ?>">URL Youtube</label>
		<input
			class="widefat"
			type="text"
			name="<?= $this->get_field_name('youtube') ?>"
			value="<?= esc_attr($youtube) ?>"
			id="<?= $this->get_field_name('youtube') ?>">
		</p>
		<?php
	}

	public function update ($newInstance, $oldInstance) {
		return $newInstance;
	}
}

class TwitchWidget extends WP_Widget {

	public function __construct()
	{
		parent::__construct('twitch_widget', 'Twitch Widget');
	}

	public function widget($args, $instance) {
		echo $args['before_widget'];
		if (isset($instance['title'])) {
			$title = apply_filters('widget_title', $instance['title']);
			echo $args['before_title'] . $title . $args['after_title'];
		}
		$twitch = isset($instance['twitch']) ? $instance['twitch'] : '';
		echo '<div class="embed-responsive embed-responsive-16by9"><iframe  class="embed-responsive-item" src="https://player.twitch.tv/?collection=' . esc_attr($twitch) . '&video=videoId&parent=oxygames.fr" frameborder="0" allowfullscreen="true" scrolling="no" height="378" width="620"></iframe></div>';
		echo $args['after_widget'];
	}
	public function form ($instance) {
		$title = isset($instance['title']) ? $instance['title'] : '';
		$twitch = isset($instance['twitch']) ? $instance['twitch'] : '';
		?>
		<p>
		<label for="<?= $this->get_field_id('title') ?>">Titre</label>
		<input
			class="widefat"
			type="text"
			name="<?= $this->get_field_name('title') ?>"
			value="<?= esc_attr($title) ?>"
			id="<?= $this->get_field_name('title') ?>">
		</p>
		<p>
		<label for="<?= $this->get_field_id('twitch') ?>">URL Twitch</label>
		<input
			class="widefat"
			type="text"
			name="<?= $this->get_field_name('twitch') ?>"
			value="<?= esc_attr($twitch) ?>"
			id="<?= $this->get_field_name('twitch') ?>">
		</p>
		<?php
	}

	public function update ($newInstance, $oldInstance) {
		return $newInstance;
	}
}

class BanniereWidget extends WP_Widget {

	public function __construct()
	{
		parent::__construct('banniere_widget', 'Banniere Widget');
	}

	public function widget($args, $instance) {
		echo $args['before_widget'];
		if (isset($instance['title'])) {
			$title = apply_filters('widget_title', $instance['title']);
			echo $args['before_title'] . $title . $args['after_title'];
		}
		$banniere = isset($instance['banniere']) ? $instance['banniere'] : '';
		echo '<img src="https://' . esc_attr($banniere) . '" class="img-fluid" alt="Responsive image">';
		echo $args['after_widget'];
	}
	public function form ($instance) {
		$title = isset($instance['title']) ? $instance['title'] : '';
		$banniere = isset($instance['banniere']) ? $instance['banniere'] : '';
		?>
		<p>
		<label for="<?= $this->get_field_id('title') ?>">Titre</label>
		<input
			class="widefat"
			type="text"
			name="<?= $this->get_field_name('title') ?>"
			value="<?= esc_attr($title) ?>"
			id="<?= $this->get_field_name('title') ?>">
		</p>
		<p>
		<label for="<?= $this->get_field_id('banniere') ?>">URL image</label>
		<input
			class="widefat"
			type="text"
			name="<?= $this->get_field_name('banniere') ?>"
			value="<?= esc_attr($banniere) ?>"
			id="<?= $this->get_field_name('banniere') ?>">
		</p>
		<?php
	}

	public function update ($newInstance, $oldInstance) {
		return $newInstance;
	}
} 