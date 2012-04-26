<?php echo $this->Form->create('Event', array('type' => 'file')); ?>
    <?php echo $this->Form->input('Event.content'); ?>
    <?php echo $this->Form->input('Event.time'); ?>
    <?php echo $this->Form->input('Event.interval'); ?>
    <?php echo $this->Form->input('Event.photo', array('type' => 'file')); ?>
<?php echo $this->Form->end('Submit'); ?>