<?php 

interface activity{
    
    public function get_user_loc_by_ip( $_IPv4 );
    public function record_user_activity( $_Useremail, $_Activity, $_IP );

}

?>