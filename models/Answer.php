<?php

namespace wp_questions;

use KMModel;

class Answer extends KMModel {
	protected static bool $soft_delete = true;

	public function user(): KMModel|null {
		return User::where( 'ID', '=', $this->created_by )->first();
	}
}