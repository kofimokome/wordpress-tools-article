<?php

namespace wp_questions;

use KMBlueprint;
use KMMigration;

class CreateAnswersTable extends KMMigration {
	protected $table_name = 'answers';

	public function up( KMBlueprint $blueprint ) {
		$blueprint->id();
		$blueprint->text( 'content' );
		$blueprint->bigInt( 'question_id' )->nullable();;
		$blueprint->bigInt( 'created_by' )->nullable();
		$blueprint->timestamps();
		$blueprint->softDelete();
	}

	public function down( KMBlueprint $blueprint ) {
		$blueprint->drop();
	}
}