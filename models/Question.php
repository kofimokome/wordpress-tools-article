<?php

namespace wp_questions;

use KMModel;

class Question extends KMModel {
	protected static bool $soft_delete = true;
}