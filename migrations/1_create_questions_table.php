<?php

namespace wp_questions;

use KMBlueprint;
use KMMigration;

class CreateQuestionsTable extends KMMigration {
	protected $table_name = 'questions';

	public function up( KMBlueprint $blueprint ) {
		$blueprint->id();
		$blueprint->string( 'title', 100 );
		$blueprint->text( 'content' );
		$blueprint->bigInt( 'created_by' )->nullable();
		$blueprint->timestamps();
		$blueprint->softDelete();
	}

	public function down( KMBlueprint $blueprint ) {
		$blueprint->drop();
	}
}