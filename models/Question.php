<?php

namespace wp_questions;

use KMModel;

class Question extends KMModel {
	protected $soft_delete = true;
	protected $timestamps = true;

	public function user() {
		return User::where( 'ID', '=', $this->created_by )->first();
	}

	public function answers(): array {
		return Answer::where( 'question_id', '=', $this->id )->get();
	}
}