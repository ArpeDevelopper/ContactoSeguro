<?php
namespace App\Classes\Socket\Base;

use Ratchet\Wamp\WampServerInterface;
use Ratchet\ConnectionInterface;


class BasePusher implements WampServerInterface
{
	 /**
     * A lookup of all the topics clients have subscribed to
     */
    protected $subscribedTopics = [];

    public function getSubscribedTopics(){
    	return $this->subscribedTopics;
    }

    public function addSubscribedTopic($topic){
    	$this->subscribedTopics[$topic->getId()] = $topic;
    }

    public function onSubscribe(ConnectionInterface $conn, $topic) {
    	$this->addSubscribedTopic($topic);
    }

    public function onUnSubscribe(ConnectionInterface $conn, $topic) {
    }

    public function onOpen(ConnectionInterface $conn) {
    	echo "Nueva conexion! ({$conn->resourceId})\n";
    }

    public function onClose(ConnectionInterface $conn) {
    	echo "Conexion {$conn->resourceId} fue desconectada\n";
    }

    public function onCall(ConnectionInterface $conn, $id, $topic, array $params) {
        // In this application if clients send data it's because the user hacked around in console
        $conn->callError($id, $topic, 'You are not allowed to make calls')->close();
    }

    public function onPublish(ConnectionInterface $conn, $topic, $event, array $exclude, array $eligible) {
        // In this application if clients send data it's because the user hacked around in console
        $conn->close();
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Un error ha ocurrido {$e->getMessage()}\n";
        $conn->close();
    }

}