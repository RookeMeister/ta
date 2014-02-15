<?php
/*
 * template for the [pdb_record] shortcode for editing a record on the frontend
 *
 * Peter Rooke
 * includes call to function that gets the course details in place of course ID
 *
 * this template uses a table to format the form
 */
?>
<div class="wrap <?php echo $this->wrap_class ?>">

  <?php // output any validation errors
 $this->print_errors(); ?>
  
  <?php // print the form header
  $this->print_form_head()
  ?>
  
  <?php while ($this->have_groups()) : $this->the_group(); ?>
    <?php $this->group->print_title() ?>
    <?php $this->group->print_description() ?>
    
    <table  class="form-table">
      
      <tbody class="field-group field-group-<?php echo $this->group->name ?>">

      <?php
      // step through the fields in the current group
	$first_field = true;
      
        while ($this->have_fields()) : $this->the_field();
          ?>
      
      <tr class="<?php $this->field->print_element_class() ?>">
      

        <th><?php $this->field->print_label() ?></th>
        <td id="<?php $this->field->print_element_id() ?>">
      
	<?php
	/*
	 * Peter Rooke
	 * for the first field (assumed to be the course ID),
	 * display the course details returned by ta_course_details
	 */
	?>
 	<?php if ($first_field) : ?>
		<?php   echo ta_course_details( $this->field->print_value( false ) ); 
			$first_field = false; ?>
 	<?php else: ?>
 		<?php $this->field->print_element(); ?>
 	<?php endif ?>
          
              <?php if ($this->field->has_help_text()) : ?>
          <span class="helptext"><?php $this->field->print_help_text() ?></span>
          <?php endif ?>
          
        </td>
        
      </tr>
      
      <?php endwhile; // field loop ?>
      
      </tbody>

    </table>
    
  <?php endwhile; // group loop ?>
    <table class="form-table">
      
    <tbody class="field-group field-group-submit">

      <tr>
        <th><h3><?php $this->print_save_changes_label() ?></h3></th>
        <td class="submit-buttons">
          <?php $this->print_submit_button('button-primary'); // you can specify a class for the button ?>
        </td>
      </tr>
      
    </tbody>

    </table><!-- end group -->
  
  <?php $this->print_form_close() ?>
  
</div>