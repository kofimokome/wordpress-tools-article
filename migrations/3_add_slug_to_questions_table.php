<?php

namespace wp_questions;

use KMBlueprint;
use KMMigration;

class AddSlugToQuestionsTable extends KMMigration {
	protected $table_name = 'questions';
	protected $is_update = true;

	public function up( KMBlueprint $blueprint ) {
		$blueprint->string( 'slug', 100 );
	}

	public function down( KMBlueprint $blueprint ) {
		$blueprint->dropColumn( 'slug' );
	}
}