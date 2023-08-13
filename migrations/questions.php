<?php

namespace wp_questions;

use KMMigration;

$questions = new KMMigration( 'questions' );
$questions->id();
$questions->string( 'title', 100 );
$questions->text( 'content' );
$questions->bigInt( 'created_by' )->nullable();
$questions->timestamps();
$questions->softDelete();

$add_slug_to_questions = new KMMigration( 'questions', true );
$add_slug_to_questions->string( 'slug' );