<?php

namespace wp_questions;

use KMModel;

class Answer extends KMModel {
	protected $soft_delete = true;
	protected $timestamps = true;

	public function user() {
		return User::where( 'ID', '=', $this->created_by )->first();
	}
}