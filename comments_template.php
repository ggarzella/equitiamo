<?php

$comments_args = array(
    'label_submit'=>'Invia',
    'title_reply'=>'Lascia un commento',
    'comment_notes_before' => '<div class="row">
                                    <div class="comment-notes col-md-12 col-xs-12">L\'email che inserirai non sarà visibile agli altri, ma solo agli amministratori del sito e servirà esclusivamente per contattarti per rispondere ad una tua eventuale richiesta.<br/>I commenti inseriti saranno visibili solo dopo l\'approvazione degli amministratori.</div>
                                </div>',
    'comment_notes_after' => '',
    'class_submit'      => 'btn btn-default submit',
    'label_submit'      => 'Invia',
    'comment_field' =>
            '<div class="row field">
                <div class="comment-form-comment form-group col-md-3 col-xs-12"><label for="comment">Commento</label></div>
                <div class="col-md-9 col-xs-12">
                    <textarea class="form-control" id="comment" name="comment" rows="5" aria-required="true"></textarea>
                </div>
            </div>',
    'fields' => array(
        'author' =>
            '<div class="row field">
                <div class="comment-form-author form-group col-md-3 col-xs-12"><label for="author">Nome</label> ' .
            ( $req ? '<span class="required">*</span>' : '' ) . '</div>' .
            '<div class="col-md-9 col-xs-12"><input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
            '" size="30"' . $aria_req . ' /></div>
            </div>',
        'email' =>
            '<div class="row field">
                <div class="comment-form-email form-group col-md-3 col-xs-12"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
            ( $req ? '<span class="required">*</span>' : '' ) . '</div>' .
            '<div class="col-md-9 col-xs-12"><input class="form-control" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
            '" size="30"' . $aria_req . ' /></div>
            </div>'
    )
);

comment_form($comments_args);

/*
 *
    'comment_field' => '<div class="form-group">
                            <label for="comment">Inserisci il tuo commento</label>
                            <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                        </div>',

 */