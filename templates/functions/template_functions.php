<?php
require "format_comment_text.php";
// Output comments to HTML
function the_comments() {
  global $comments;

  echo '
    <div class="comments"><h2>Comments</h2>
  ';

  // TODO
  foreach($comments as $comment){
    echo '
      <div class="comment">
    
        <div class="ID">
          Post ID: '. $comment->ID .'</div>
    
        <div class="date">
            Posted on: '. $comment->date .'    </div>
    
        <h3>New comment by: '. $comment->email .'</h3>
    
        <div class="mood">
          Current mood: '. $comment->mood .'    </div>
    
        <div class="comment-text">
          <p>'. $comment->commentText .'</div>
    
      </div>
    ';
  };
}

// Output unique email addresses to HTML
function the_commenters() {
  global $filter;
  global $commenters;

  //TODO
  echo '
    </div><div class="commenters"><h2>People Who have Commented:</h2><ul>
  ';
  
  foreach($commenters as $commenter){
    echo '
      <li>'. $commenter->email . '</li>';
  }

  echo '</ul>';
}
