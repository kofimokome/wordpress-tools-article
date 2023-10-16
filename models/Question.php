<?php

namespace wp_questions;

use KMModel;

class Question extends KMModel {
	protected $soft_delete = true;
	protected $timestamps = true;
}