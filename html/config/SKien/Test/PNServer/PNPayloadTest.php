<?php
declare(strict_types=1);

namespace SKien\Test\PNServer;

use PHPUnit\Framework\TestCase;
use SKien\PNServer\PNPayload;

/**
 * @author Stefanius <s.kien@online.de>
 * @copyright MIT License - see the LICENSE file for details
 */
class PNPayloadTest extends TestCase
{
    protected PNPayload $pl;
    protected string $strExpected;
    
    public function setUp() : void
    {
        $this->pl = new PNPayload('title', 'text', 'icon.png');
        
        $this->strExpected  = '{';
        $this->strExpected .= '"title":"title",';
        $this->strExpected .= '"opt":{';
        $this->strExpected .= '"body":"text",';
        $this->strExpected .= '"icon":"icon.png",';
        $this->strExpected .= '"data":{"url":"url.php"},';
        $this->strExpected .= '"tag":"tag",';
        $this->strExpected .= '"renotify":true,';
        $this->strExpected .= '"image":"image.png",';
        $this->strExpected .= '"badge":"badge.png",';
        $this->strExpected .= '"actions":[';
        $this->strExpected .= '{"action":"ok","title":"OK","icon":"ok.png","custom":"customOK"},';
        $this->strExpected .= '{"action":"cancel","title":"Cancel","icon":"cancel.png","custom":"customCancel"}';
        $this->strExpected .= '],';
        $this->strExpected .= '"timestamp":"1588716000000",';
        $this->strExpected .= '"requireInteraction":true,';
        $this->strExpected .= '"silent":false,';
        $this->strExpected .= '"vibrate":[300,100,400],';
        $this->strExpected .= '"sound":"sound.mp3"';
        $this->strExpected .= '}}';
    }
    
    public function test_construct() : void
    {
        $data = $this->pl->getPayload();
        $this->assertTrue(is_array($data));
        $this->assertArrayHasKey('title', $data);
        $this->assertArrayHasKey('opt', $data);
        $this->assertTrue(is_array($data['opt']));
    }
    
    public function test_set() : void
    {
        $this->pl->setURL('url.php');
        $this->pl->setTag('tag', true);
        $this->pl->setImage('image.png');
        $this->pl->setBadge('badge.png');
        $this->pl->addAction('ok', 'OK', 'ok.png', 'customOK');
        $this->pl->addAction('cancel', 'Cancel', 'cancel.png', 'customCancel');
        $this->pl->setTimestamp(mktime(0, 0, 0, 5, 6, 2020));
        $this->pl->requireInteraction();
        // set to true - must be reseted to false by setVibration() !!!
        $this->pl->setSilent(true);
        $this->pl->setVibration([300, 100, 400]);
        $this->pl->setSound('sound.mp3');
        $this->assertEquals($this->strExpected, $this->pl->toJSON());

        // same value but other types
        $this->pl->setTimestamp('2020-05-06');
        $this->assertEquals($this->strExpected, $this->pl->toJSON());
        
        $this->pl->setTimestamp(new \DateTime('2020-05-06'));
        $this->assertEquals($this->strExpected, $this->pl->toJSON());
        
        // now the ['opt']['vibrate'] property must be reseted
        $this->pl->setSilent(true);
        $data = $this->pl->getPayload();
        $this->assertArrayNotHasKey('vibrate', $data['opt']);
    }
}
