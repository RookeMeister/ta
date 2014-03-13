<?php
/*
 * template for signup form
 *
 * Peter Rooke
 * added hidden field containing the course ID passed via the URL
 *
 * If the signup form setting "Show Field Groups" is selected, the form fields
 * will be grouped by the field groups that have their "visible" attribute
 * checked in the manage database fields page.
 *
 * If the "Show Field Groups" setting is not checked, the fields will be shown
 * in the same order, but without the group titles.
 *
 * this template is a simple demonstration of what is possible it is set up to
 * output the form exactly as it was output before we brought in templates so the
 * upgrade will not affect existing installations
 *
 * for those unfamiliar with PHP, just remember that something like
 * <?php echo $field->title ?> just prints out the field's title. You can move it
 * around, but leave all the parts between the <> brackets as they are.
 *
 */
 ?>
<div class="wrap <?php echo $this->wrap_class ?>" >

  <?php // output any validation errors
  $this->print_errors(); ?>

  <?php $this->print_form_head(); // this must be included before any fields are output. hidden fields may be added here as an array argument to the function ?>

    <input name="course_id" type="hidden"   value="<?php echo $_GET['course']; ?>" />

      <?php while ( $this->have_groups() ) : $this->the_group(); ?>

        <?php if ( $this->group->printing_title() ) : // are we printing group titles and descriptions? ?>
      <tbody class="field-group field-group-<?php echo $this->group->name ?>">
        <tr class="signup-group">
          <td colspan="2">
        
            <?php $this->group->print_title() ?>
            <?php $this->group->print_description() ?>

          </td>
        </tr>
        <?php else : ?>
        <?php endif; // end group title/description row ?>

* Required fields<br/>

        <?php while ( $this->have_fields() ) : $this->the_field(); ?>

        <br/>

          <?php $this->field->print_label(); // this function adds the required marker ?>

          <br/>

            <?php $this->field->print_element(); ?>

            <?php if ( $this->field->has_help_text() ) :?>
            <span class="helptext"><?php $this->field->print_help_text() ?></span>
            <?php endif ?>
            
          

        
  
        <?php endwhile; // fields ?>
        
        

      <?php endwhile; // groups ?>
      
        <br/><br/>
            
           <?php $this->print_submit_button('button-primary'); // you can specify a class for the button ?>
            
          

            
           <?php $this->print_retrieve_link(); // this only prints if enabled in the settings ?>
           
          
        
        
      
      
    
    
  <?php $this->print_form_close() ?>
  
</div>