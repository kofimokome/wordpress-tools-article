<?php

namespace wp_questions;
get_header();
$id       = sanitize_text_field( get_query_var( 'id' ) );
$question = Question::find( $id );

?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="row page-title align-items-center">
                    <div class="col-sm-4 col-xl-6">
                        <h4 class="mb-1 mt-0">Edit Question</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="#" id="update-question-form">
                            <div class="form-group">
                                <input type="hidden" name="question_id" value="<?php echo $question->id ?>">
                                <label for="title">Title</label>
                                <input name="title" type="text" class="form-control" id="title"
                                       aria-describedby="titleHelp" placeholder="Is history the study of past events?"
                                       required="" value="<?php echo $question->title ?>">
                                <small id="titleHelp" class="form-text text-muted">Keep the title short and
                                    precise</small>
                            </div>
                            <div class="form-group mt-2">
                                <label for="content">Body</label>
                                <textarea name="content" type="password" class="form-control" id="content" rows="10"
                                          required=""><?php echo $question->content ?></textarea>
                                <small id="contentHelp" class="form-text text-muted">
                                    Include all the information someone would need to answer your question
                                </small>
                            </div>
                            <button type="submit" class="btn btn-primary" data-toggle="modal"
                                    id="#update-question">Update question
                            </button>
                        </form>
                    </div> <!-- end card-body-->
                </div>
            </div>
        </div>
    </div>
	<?php
get_footer();
