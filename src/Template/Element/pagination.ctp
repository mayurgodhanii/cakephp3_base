<div class="m-pagination">
    <div class="paging">
        <?php
        echo $this->Paginator->first('First', array(), null, array('class' => 'first'));
        echo $this->Paginator->prev('Previous', array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next('Next', array(), null, array('class' => 'next disabled'));
        echo $this->Paginator->last('Last', array(), null, array('class' => 'last'));
        ?>
    </div>
</div>