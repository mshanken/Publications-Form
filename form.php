<?        
        $error = '';
        $wsoption = '';
        $caoption = '';
        $waoption = '';
        $mwoption = '';
        $faoption = '';
        $imoption = '';
        $fname = '';
        $lname = '';
        $company = '';
        $email = '';
        $street = '';
        $city = '';
        $state = '';
        $zipCode = '';
        $country = '';
        $verify = '';
    
        if(isset($_POST['sendform'])) {
                                        
          $wsoption = $_POST['wsoption'];
          $caoption = $_POST['caoption'];
          $waoption = $_POST['waoption'];
          $mwoption = $_POST['mwoption'];
          $faoption = $_POST['faoption'];
          $imoption = $_POST['imoption'];
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $company = $_POST['company'];
          $email = $_POST['email'];
          $street = $_POST['street'];
          $city = $_POST['city'];
          $state = $_POST['state'];
          $zipCode = $_POST['zipCode'];
          $country = $_POST['country'];
          $verify = $_POST['verify'];

    
        if(trim($fname) == '') {
          $error = '<div class="error_message"><img src="https://s3.amazonaws.com/assets.mshanken.com/wso/static/promos/error.png" title="error!" alt="error!" />You must enter your first name!</div>';
        } else if(trim($lname) == '') {
          $error = '<div class="error_message"><img src="https://s3.amazonaws.com/assets.mshanken.com/wso/static/promos/error.png" title="error!" alt="error!" />You must enter a last name!</div>';
        } else if(trim($email) == '') {
          $error = '<div class="error_message"><img src="https://s3.amazonaws.com/assets.mshanken.com/wso/static/promos/error.png" title="error!" alt="error!" />Please enter a valid email address.</div>';
        } else if(!isEmail($email)) {
          $error = '<div class="error_message"><img src="https://s3.amazonaws.com/assets.mshanken.com/wso/static/promos/error.png" title="error!" alt="error!" />Attention! You have entered an invalid e-mail address, please try again.</div>';
        } else if(trim($verify) == '') {
          $error = '<div class="error_message"><img src="https://s3.amazonaws.com/assets.mshanken.com/wso/static/promos/error.png" title="error!" alt="error!" />Attention! Please enter the verification number.</div>';
        } else if(trim($verify) != '4') {
          $error = '<div class="error_message"><img src="https://s3.amazonaws.com/assets.mshanken.com/wso/static/promos/error.png" title="error!" alt="error!" />Attention! The verification number you entered is incorrect.</div>';
        }
    
        if($error == '') {

          $address = "custserv@mshanken.com";

          $e_subject = 'M. Shanken Publication Subscription Order Form has been filled out...';
          
          $e_body = "$fname $lname has filled out the Publication Subscription form.\r\n\nTheir information:\r\n\n";
          $e_content = "Name: $fname $lname\r\n\nCompany: $company\r\n\nEmail: $email\r\n\nStreet: $street\r\n\nCity/State: $city, $state\r\n\nZip: $zipCode\r\n\nCountry: $country\r\n\n";
          $e_options = "These are the options they selected:\r\n\nWine Spectator: $wsoption\r\n\nCigar Aficionado: $caoption\r\n\nWhisky Advocate: $waoption\r\n\nMarket Watch: $mwoption\r\n\nFood Arts: $faoption\r\n\nImpact: $imoption";
          
          $msg = $e_body . $e_content . $e_options;

          mail($address, $e_subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n");


          // Email has sent successfully, echo a success page.
          
          echo "<div id='success_page'>";
          echo "<img id='' src='https://s3.amazonaws.com/assets.mshanken.com/wso/static/promos/accepted.png' title='success!' alt='success!' />";
          echo "<h1>Thank you for your order.</h1>";
          echo "<p>Please allow 4-6 weeks for your first issue to arrive.</p>";
          echo "</div>";
                      
        }
      }

        if(!isset($_POST['sendform']) || $error != '') // Do not edit.
        {
?>

	<? echo $error; ?>
    
    <form id="subform" method="post" action="" class="form-horizontal">
      <div class="row-fluid grouping">
       
          <div class="span4">
            <fieldset id="ws" class="">            
              <h3 class="label">Wine Spectator</h3>
              <figure>
                <img src="https://s3.amazonaws.com/assets.mshanken.com/wso/static/promos/ws.jpg" title="Wine Spectator magazine" alt="Wine Spectator">
                <figcaption class="tagline">Take the Guesswork Out of Enjoying Wine</figcaption>
              </figure>  
              <ul>
                <li>
                  <label class="radio">
                    <input type="radio" name="wsoption" id="ws-us1" value="$49.95/year US 15 issues">$49.95/year US 15 issues</input>
                  </label>
                </li>
                <li>
                  <label class="radio">
                    <input type="radio" name="wsoption" id="ws-can1" value="$80.00/year Canada 15 issues">$80.00/year Canada 15 issues</input>
                  </label>
                </li>
                <li>
                  <label class="radio">
                    <input type="radio" name="wsoption" id="ws-for1" value="$145.00/year Foreign 15 issues">$145.00/year Foreign 15 issues</input>
                  </label>
                </li>
                <li>
                  <label class="radio">
                    <input type="radio" name="wsoption" id="ws-none" value="None" checked="checked">No thanks.</input>
                  </label>
                </li>
              </ul>
            </fieldset>
          </div>

          <div class="span4">
            <fieldset id="ca" class="clearfix">
              <h3 class="label">Cigar Aficionado</h3>
              <figure>
                <img src="https://s3.amazonaws.com/assets.mshanken.com/wso/static/promos/ca.jpg" title="Cigar Aficionado magazine" alt="Cigar Aficionado">
                <figcaption class="tagline">The Good Life Magazine for Men</figcaption>
              </figure>
              <ul>
                <li>
                  <label class="radio">
                    <input type="radio" name="caoption" id="ca-us1" value="$19.95/year US 6 issues">$19.95/year US 6 issues</input>
                  </label>
                </li>
                <li>
                  <label class="radio">
                    <input type="radio" name="caoption" id="ca-can1" value="$38.00/year Canada 6 issues">$38.00/year Canada 6 issues</input>
                  </label>
                </li>
                <li>
                  <label class="radio">
                    <input type="radio" name="caoption" id="ca-for1" value="$56.00/year Foreign 6 issues">$56.00/year Foreign 6 issues</input>
                  </label>
                </li>
                <li>
                  <label class="radio">
                    <input type="radio" name="caoption" id="ca-none" value="None" checked="checked">No thanks.</input>
                  </label>
                </li>
              </ul>
            </fieldset>
          </div>

          <div class="span4">
          <fieldset id="wa" class="">
            <h3 class="label">Whisky Advocate</h3>
            <figure>
              <img src="https://s3.amazonaws.com/assets.mshanken.com/wso/static/promos/wa.jpg" title="Whisky Advocate magazine" alt="Whisky Advocate">
              <figcaption class="tagline">America's Leading Whisky magazine</figcaption>
            </figure>
            <ul>
              <li>
                <label class="radio">
                  <input type="radio" name="waoption" id="wa-us1" value="$18.00/year US 4 issues">$18.00/year US 4 issues</input>
                </label>
              </li>
              <li>
                <label class="radio">
                  <input type="radio" name="waoption" id="wa-can1" value="$24.00/year Canada 4 issues">$24.00/year Canada 4 issues</input>
                </label>
              </li>
              <li>
                <label class="radio">
                  <input type="radio" name="waoption" id="wa-for1" value="$40.00/year Foreign 4 issues">$40.00/year Foreign 4 issues</input>
                </label>
              </li>
              <li>
                  <label class="radio">
                    <input type="radio" name="waoption" id="wa-none" value="None" checked="checked">No thanks.</input>
                  </label>
                </li>
            </ul>
          </fieldset>
          </div>
        </div><!-- /.row-fluid -->

        <div class="row-fluid grouping">
          <div class="span4">
          <fieldset id="mw" class="">
            <h3 class="label">Market Watch</h3>
            <figure>
              <img src="https://s3.amazonaws.com/assets.mshanken.com/wso/static/promos/mw.jpg" title="Market Watch magazine" alt="Market Watch">
              <figcaption class="tagline">Keep on top of the Wine, Spirits and Beer Business</figcaption>
            </figure>
            <p class="freemsg">Free Digital Edition with Print Subscription</p>
            <ul>
              <li>
                <label class="radio">
                  <input type="radio" name="mwoption" id="mw-us1" value="$60.00/year US 10 issues">$60.00/year US 10 issues</input>
                </label>
              </li>
              <li>
                <label class="radio">
                  <input type="radio" name="mwoption" id="mw-can1" value="$70.00/year Canada 10 issues">$70.00/year Canada 10 issues</input>
                </label>
              </li>
              <li>
                <label class="radio">
                  <input type="radio" name="mwoption" id="mw-for1" value="$85.00/year Foreign 10 issues">$85.00/year Foreign 10 issues</input>
                </label>
              </li>
              <li>
                  <label class="radio">
                    <input type="radio" name="mwoption" id="mw-none" value="None" checked="checked">No thanks.</input>
                  </label>
                </li>
            </ul>
          </fieldset>
          </div>


          <div class="span4">
            <fieldset id="fa" class="">
            <h3 class="label">Food Arts</h3>
            <figure>
              <img src="https://s3.amazonaws.com/assets.mshanken.com/wso/static/promos/fa.jpg" title="Food Arts magazine" alt="Food Arts">
              <figcaption class="tagline">At the Restaurant and Hotel Forefront</figcaption>
            </figure>
            <p class="freemsg">Free Digital Edition with Print Subscription</p>
            <ul>
              <li>
                <label class="radio">
                  <input type="radio" name="faoption" id="fa-us1" value="$40.00/year US 10 issues">$40.00/year US 10 issues</input>
                </label>
              </li>
              <li>
                <label class="radio">
                  <input type="radio" name="faoption" id="fa-can1" value="$46.00/year Canada 10 issues">$46.00/year Canada 10 issues</input>
                </label>
              </li>
              <li>
                <label class="radio">
                  <input type="radio" name="faoption" id="fa-for1" value="$60.00/year Foreign 10 issues">$60.00/year Foreign 10 issues</input>
                </label>
              </li>
              <li>
                  <label class="radio">
                    <input type="radio" name="faoption" id="fa-none" value="None" checked="checked">No thanks.</input>
                  </label>
                </li>
            </ul>
          </fieldset>
          </div>

          <div class="span4">
          <fieldset id="im" class="">
            <h3 class="label">Impact</h3>
            <figure>
              <img src="https://s3.amazonaws.com/assets.mshanken.com/wso/static/promos/im.jpg" title="Impact magazine" alt="Impact">
              <figcaption class="tagline">News and Research For the Beverage Alcohol Executive</figcaption>
            </figure>
            <p class="freemsg">Free Digital Edition with Print Subscription</p>
            <ul>
              <li>
                <label class="radio">
                  <input type="radio" name="imoption" id="im-uscan1" value="$975.00/year US/Canada 16 issues">$975.00/year US/Canada 16 issues</input>
                </label>
              </li>
              <li>
                <label class="radio">
                  <input type="radio" name="imoption" id="im-for1" value="$1,075/year Foreign 16 issues">$1,075/year Foreign 16 issues</input>
                </label>
              </li>
              <li>
                  <label class="radio">
                    <input type="radio" name="imoption" id="im-none" value="None" checked="checked">No thanks.</input>
                  </label>
                </li>
            </ul>
          </fieldset>
          </div>
        </div><!-- /.row-fluid -->
        
        <div class="row-fluid grouping">
          <div class="span12">
          <fieldset id="imdb" class="">
            <figure>
                <img src="https://s3.amazonaws.com/assets.mshanken.com/wso/static/promos/imdb.jpg" title="Impact Databank" alt="Impact Databank">
              </figure>
            <h3 class="label">Impact Databank</h3>
            <p class="tagline">Exclusive beer, wine &amp; distilled spirits industry reports with data and analysis:</h4> 
            <p>brand data, consumption trends, brand depletion trends, drinker demographics, advertising expenditures and much more.</p>
            <p><a href="http://assets.winespectator.com/wso/pdf/ImpactOrderForm2-2013.pdf" alt="Impact Databank order link" target="_blank">Click here for more information (PDF).</a>
          </fieldset>
        </div>
        </div><!-- /.row-fluid --> 

        <div class="row-fluid">
        <div class="span12">
          
          <fieldset class="form-stacked" id="yourinfo">
          <h3 class="label">Please fill out your information</h3>
            
            <div class="control-group">
              <label class="control-label" for="fname">First Name</label>
              <div class="controls">
                <input type="text" class="span9" id="fname" name="fname" placeholder="First Name" value="<?=$fname;?>" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="lname">Last Name</label>
              <div class="controls">
                <input type="text" class="span9" id="lname" name="lname" placeholder="Last Name" value="<?=$lname;?>" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="company">Company</label>
              <div class="controls">
                <input type="text" class="span9" id="company" name="company" value="<?=$company;?>" placeholder="Where do you work?">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="email">Email</label>
              <div class="controls">
                <input type="text" class="span9" id="email" name="email" value="<?=$email;?>" placeholder="What is your Email address?" required>
              </div>
            </div>
            
             <div class="control-group">
              <label class="control-label" for="street">Street</label>
              <div class="controls">
                <input type="text" class="span9" id="street" name="street" value="<?=$street;?>" placeholder="Street Address" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="city">City</label>
              <div class="controls">
                <input type="text" class="span9" id="city" name="city" value="<?=$city;?>" placeholder="City" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="state">State</label>
              <div class="controls">
                <input type="text" class="span9" id="state" name="state" value="<?=$state;?>" placeholder="State" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="zipCode">Zip Code</label>
              <div class="controls">
                <input type="text" class="span9" id="zipCode" name="zipCode" value="<?=$zipCode;?>" placeholder="Zip Code" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="country">Country</label>
              <div class="controls">
                <input type="text" class="span9" id="country" name="country" value="<?=$country;?>" placeholder="Country" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for=verify accesskey=V>3 + 1 =</label>
              <div class="controls">
                <input name="verify" class="span9" type="text" id="verify" name="verify" placeholder="Help us fight spam by answering this simple question..." value="<?=$verify;?>" />
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <input class="btn span5 offset2" name="sendform" id="sendform" type="submit" value="Bill Me">
              </div>
            </div>

          </fieldset>
        </div>
        </div><!-- /.row-fluid --> 
       
    </div><!-- /.row-fluid -->
     </form>
            
<? } 
	
function isEmail($email) { // Email address verification, do not edit.
return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
}

?>