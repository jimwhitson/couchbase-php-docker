<?php
$bucketName = "test";

// Establish username and password for bucket-access
$authenticator = new \Couchbase\PasswordAuthenticator();
$authenticator->username('Administrator')->password('password');

// Connect to Couchbase Server
$cluster = new CouchbaseCluster("couchbase://ec2-35-178-23-229.eu-west-2.compute.amazonaws.com");

// Authenticate, then open bucket
$cluster->authenticate($authenticator);
$bucket = $cluster->openBucket($bucketName);

// Store a document
echo "Storing u:king_arthur\n";
$result = $bucket->upsert('u:king_arthur', array(
    "email" => "kingarthur@couchbase.com",
    "interests" => array("African Swallows")
));

var_dump($result);

// Retrieve a document
echo "Getting back u:king_arthur\n";
$result = $bucket->get("u:king_arthur");
var_dump($result->value);

// Replace a document
echo "Replacing u:king_arthur\n";
$doc = $result->value;
array_push($doc->interests, 'PHP 7');
$bucket->replace("u:king_arthur", $doc);
var_dump($result);
