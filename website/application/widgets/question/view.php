<div class="bgr-main-table">
    <div class="container">
        <div class="main-faq">
        <div class="section-title">
            <h2>Câu hỏi thường gặp</h2>
        </div>
        <div class="list-faq">
        <?php foreach($ykcustomer as $question) :  ?>
            <div class="item-faq">
                <div class="question" data-click="0" data-index=""><?=@$question->name;?></div>
                <div class="answer">
                  <?=@$question->description;?>
                </div>
            </div>
            <?php endforeach;?>  
           
        </div>
        </div>
    </div>
</div>