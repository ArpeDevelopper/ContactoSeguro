<?php
namespace App\Classes\Socket;
use App\Classes\Socket\Base\BaseSocket;
use Ratchet\ConnectionInterface;

class ChatSocket extends BaseSocket
{
	
	protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "Nueva conexion! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
    	$numRecv = count($this->clients)-1;

    	echo sprintf('Conexion %d enviando mensaje "%s" to %d otras conexion%s '."\n", $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        foreach ($this->clients as $client) {
            if ($from != $client) {
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);

        echo "Conexion {$conn->resourceId} fue desconectada\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
    	echo "Un error ha ocurrido {$e->getMessage()}\n";

        $conn->close();
    }
}