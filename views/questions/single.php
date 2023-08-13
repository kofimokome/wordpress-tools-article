<?php

namespace wp_questions;

use KMRoute;

get_header();
$slug     = sanitize_text_field( get_query_var( 'slug' ) );
$question = Question::where( 'slug', '=', $slug )->first();

?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">

                <div class="row page-title align-items-center">
                    <div class="col-12 d-flex justify-content-end">
                        <a class="btn btn-primary"
                           href="<?php echo KMRoute::route( 'questions.edit', [ 'id' => $question->id ] ) ?>">Edit
                            question</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="row d-flex align-items-center">
                    <div class="col-12">
                        <h1 class="mb-1 mt-0"><?php echo $question->title ?> </h1>
                        <div>
                            asked on the <?php echo date( 'Y-m-d', $question->created_at ) ?> by
                            <a href="#"><?php echo $question->user()->display_name ?></a>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6 mx-auto">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
										<?php echo $question->content ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php if ( $answers = $question->answers() ): ?>
            <div class="row mt-3">
                <div class="col-md-6 mx-auto">
                    <h3>Answers</h3>
					<?php foreach ( $answers as $answer ): ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
												<?php echo $answer->content ?>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            Answered on the <?php echo date( 'Y-m-d', $answer->created_at ) ?>
                                            by
                                            <a href="#"><?php echo $answer->user()->display_name ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php endforeach; ?>
                </div>
            </div>
		<?php endif; ?>
        <div class="row mt-3">
            <div class="col-md-6 mx-auto">
                <h3>Your answer</h3>
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="#" id="new-answer-form">
                            <input type="hidden" name="question_id" value="<?php echo $question->id ?>">
                            <div class="form-group">
                                <textarea name="content" type="password" class="form-control" id="content" rows="10"
                                          required="" placeholder="Your answer here"></textarea>

                            </div>

                            <button type="submit" class="btn btn-primary" id="submit-answer">Submit answer
                            </button>
                        </form>
                    </div> <!-- end card-body-->
                </div>

            </div>
        </div>
    </div>
	<?php
get_footer();
