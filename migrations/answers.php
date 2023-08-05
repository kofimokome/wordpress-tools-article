<?php

namespace wp_questions;

use KMMigration;

$answers = new KMMigration('answers');
$answers->id();
$answers->text( 'content' );
$answers->bigInt( 'question_id' )->nullable();
$answers->bigInt( 'created_by' )->nullable();
$answers->timestamps();
$answers->softDelete();