<?php

namespace wp_questions;

use KMModel;

class Question extends KMModel {
	protected static bool $soft_delete = true;

	public function user(): KMModel|null {
		return User::where( 'ID', '=', $this->created_by )->first();
	}

	public function answers(): array {
		return Answer::where( 'question_id', '=', $this->id )->get();
	}
}