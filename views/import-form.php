<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
if (current_user_can( 'manage_options' ) ) {
?>
<div class="IUTIIContactImportForm IUTI-modal-content">
    <span class="close IUTICloseModalListing">&times;</span>
    <div>
        <div class="alert" id="IUTIIContactImportFormDiv" style="display: none;"></div>
        <form method="POST" id="IUTIIContactImportForm" name="IUTIIContactImportForm">
            <input type="hidden" name="user_id" value="<?php echo $userId; ?>"/>
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="firstname" value="<?php echo $importUserData[ 'first_name' ] ?>"
                   readonly="readonly" placeholder="User First name..">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lastname" value="<?php echo $importUserData[ 'last_name' ]; ?>"
                   readonly="readonly" placeholder="User Last name..">

            <label for="email">Email Address</label>
            <input type="text" id="email" name="email" value="<?php echo $importUserData[ 'email' ]; ?>"
                   readonly="readonly" placeholder="User Email..">

            <label for="i_contact_list">IContact List</label>
            <select id="i_contact_list" name="i_contact_list">
                <?php foreach ( $iContactLists as $key => $list ) { ?>
                    <option value="<?php echo $list->listId; ?>" <?php if ( !$key ) {
                        echo 'selected="selected"';
                    } ?> ><?php echo $list->name; ?></option>
                <?php } ?>
            </select>
            <Button type="submit" class="IUTIIContactImportFormButton" id="IUTIIContactImportFormSubmit">
                <img id="IUTILoaderImage" style="display: none;"
                     src="<?php echo IUTI_DIRECTORY_PLUGIN_URL . 'assets/img/loading-gif.gif'; ?>"/>
                Submit
            </Button>
        </form>
    </div>

</div>
<?php } ?>