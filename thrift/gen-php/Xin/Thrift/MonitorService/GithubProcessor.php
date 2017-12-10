<?php
namespace Xin\Thrift\MonitorService;
/**
 * Autogenerated by Thrift Compiler (0.11.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


class GithubProcessor {
  protected $handler_ = null;
  public function __construct($handler) {
    $this->handler_ = $handler;
  }

  public function process($input, $output) {
    $rseqid = 0;
    $fname = null;
    $mtype = 0;

    $input->readMessageBegin($fname, $mtype, $rseqid);
    $methodname = 'process_'.$fname;
    if (!method_exists($this, $methodname)) {
      $input->skip(TType::STRUCT);
      $input->readMessageEnd();
      $x = new TApplicationException('Function '.$fname.' not implemented.', TApplicationException::UNKNOWN_METHOD);
      $output->writeMessageBegin($fname, TMessageType::EXCEPTION, $rseqid);
      $x->write($output);
      $output->writeMessageEnd();
      $output->getTransport()->flush();
      return;
    }
    $this->$methodname($rseqid, $input, $output);
    return true;
  }

  protected function process_receivedEvents($seqid, $input, $output) {
    $bin_accel = ($input instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary_after_message_begin');
    if ($bin_accel)
    {
      $args = thrift_protocol_read_binary_after_message_begin($input, '\Xin\Thrift\MonitorService\Github_receivedEvents_args', $input->isStrictRead());
    }
    else
    {
      $args = new \Xin\Thrift\MonitorService\Github_receivedEvents_args();
      $args->read($input);
      $input->readMessageEnd();
    }
    $result = new \Xin\Thrift\MonitorService\Github_receivedEvents_result();
    try {
      $result->success = $this->handler_->receivedEvents($args->username, $args->token);
    } catch (\Xin\Thrift\MonitorService\ThriftException $ex) {
      $result->ex = $ex;
    }
    $bin_accel = ($output instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($output, 'receivedEvents', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
    }
    else
    {
      $output->writeMessageBegin('receivedEvents', TMessageType::REPLY, $seqid);
      $result->write($output);
      $output->writeMessageEnd();
      $output->getTransport()->flush();
    }
  }
  protected function process_commits($seqid, $input, $output) {
    $bin_accel = ($input instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary_after_message_begin');
    if ($bin_accel)
    {
      $args = thrift_protocol_read_binary_after_message_begin($input, '\Xin\Thrift\MonitorService\Github_commits_args', $input->isStrictRead());
    }
    else
    {
      $args = new \Xin\Thrift\MonitorService\Github_commits_args();
      $args->read($input);
      $input->readMessageEnd();
    }
    $result = new \Xin\Thrift\MonitorService\Github_commits_result();
    try {
      $result->success = $this->handler_->commits($args->committer, $args->token);
    } catch (\Xin\Thrift\MonitorService\ThriftException $ex) {
      $result->ex = $ex;
    }
    $bin_accel = ($output instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($output, 'commits', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
    }
    else
    {
      $output->writeMessageBegin('commits', TMessageType::REPLY, $seqid);
      $result->write($output);
      $output->writeMessageEnd();
      $output->getTransport()->flush();
    }
  }
  protected function process_release($seqid, $input, $output) {
    $bin_accel = ($input instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary_after_message_begin');
    if ($bin_accel)
    {
      $args = thrift_protocol_read_binary_after_message_begin($input, '\Xin\Thrift\MonitorService\Github_release_args', $input->isStrictRead());
    }
    else
    {
      $args = new \Xin\Thrift\MonitorService\Github_release_args();
      $args->read($input);
      $input->readMessageEnd();
    }
    $result = new \Xin\Thrift\MonitorService\Github_release_result();
    try {
      $result->success = $this->handler_->release($args->owner, $args->repo);
    } catch (\Xin\Thrift\MonitorService\ThriftException $ex) {
      $result->ex = $ex;
    }
    $bin_accel = ($output instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($output, 'release', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
    }
    else
    {
      $output->writeMessageBegin('release', TMessageType::REPLY, $seqid);
      $result->write($output);
      $output->writeMessageEnd();
      $output->getTransport()->flush();
    }
  }
  protected function process_updateFollowers($seqid, $input, $output) {
    $bin_accel = ($input instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary_after_message_begin');
    if ($bin_accel)
    {
      $args = thrift_protocol_read_binary_after_message_begin($input, '\Xin\Thrift\MonitorService\Github_updateFollowers_args', $input->isStrictRead());
    }
    else
    {
      $args = new \Xin\Thrift\MonitorService\Github_updateFollowers_args();
      $args->read($input);
      $input->readMessageEnd();
    }
    $result = new \Xin\Thrift\MonitorService\Github_updateFollowers_result();
    try {
      $result->success = $this->handler_->updateFollowers($args->username, $args->token);
    } catch (\Xin\Thrift\MonitorService\ThriftException $ex) {
      $result->ex = $ex;
    }
    $bin_accel = ($output instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($output, 'updateFollowers', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
    }
    else
    {
      $output->writeMessageBegin('updateFollowers', TMessageType::REPLY, $seqid);
      $result->write($output);
      $output->writeMessageEnd();
      $output->getTransport()->flush();
    }
  }
  protected function process_updateFollowing($seqid, $input, $output) {
    $bin_accel = ($input instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary_after_message_begin');
    if ($bin_accel)
    {
      $args = thrift_protocol_read_binary_after_message_begin($input, '\Xin\Thrift\MonitorService\Github_updateFollowing_args', $input->isStrictRead());
    }
    else
    {
      $args = new \Xin\Thrift\MonitorService\Github_updateFollowing_args();
      $args->read($input);
      $input->readMessageEnd();
    }
    $result = new \Xin\Thrift\MonitorService\Github_updateFollowing_result();
    try {
      $result->success = $this->handler_->updateFollowing($args->username, $args->token);
    } catch (\Xin\Thrift\MonitorService\ThriftException $ex) {
      $result->ex = $ex;
    }
    $bin_accel = ($output instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($output, 'updateFollowing', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
    }
    else
    {
      $output->writeMessageBegin('updateFollowing', TMessageType::REPLY, $seqid);
      $result->write($output);
      $output->writeMessageEnd();
      $output->getTransport()->flush();
    }
  }
  protected function process_followingCommits($seqid, $input, $output) {
    $bin_accel = ($input instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary_after_message_begin');
    if ($bin_accel)
    {
      $args = thrift_protocol_read_binary_after_message_begin($input, '\Xin\Thrift\MonitorService\Github_followingCommits_args', $input->isStrictRead());
    }
    else
    {
      $args = new \Xin\Thrift\MonitorService\Github_followingCommits_args();
      $args->read($input);
      $input->readMessageEnd();
    }
    $result = new \Xin\Thrift\MonitorService\Github_followingCommits_result();
    try {
      $result->success = $this->handler_->followingCommits($args->username, $args->token);
    } catch (\Xin\Thrift\MonitorService\ThriftException $ex) {
      $result->ex = $ex;
    }
    $bin_accel = ($output instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($output, 'followingCommits', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
    }
    else
    {
      $output->writeMessageBegin('followingCommits', TMessageType::REPLY, $seqid);
      $result->write($output);
      $output->writeMessageEnd();
      $output->getTransport()->flush();
    }
  }
  protected function process_commitsLog($seqid, $input, $output) {
    $bin_accel = ($input instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary_after_message_begin');
    if ($bin_accel)
    {
      $args = thrift_protocol_read_binary_after_message_begin($input, '\Xin\Thrift\MonitorService\Github_commitsLog_args', $input->isStrictRead());
    }
    else
    {
      $args = new \Xin\Thrift\MonitorService\Github_commitsLog_args();
      $args->read($input);
      $input->readMessageEnd();
    }
    $result = new \Xin\Thrift\MonitorService\Github_commitsLog_result();
    try {
      $result->success = $this->handler_->commitsLog($args->committer, $args->btime, $args->etime);
    } catch (\Xin\Thrift\MonitorService\ThriftException $ex) {
      $result->ex = $ex;
    }
    $bin_accel = ($output instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($output, 'commitsLog', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
    }
    else
    {
      $output->writeMessageBegin('commitsLog', TMessageType::REPLY, $seqid);
      $result->write($output);
      $output->writeMessageEnd();
      $output->getTransport()->flush();
    }
  }
  protected function process_userProfile($seqid, $input, $output) {
    $bin_accel = ($input instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary_after_message_begin');
    if ($bin_accel)
    {
      $args = thrift_protocol_read_binary_after_message_begin($input, '\Xin\Thrift\MonitorService\Github_userProfile_args', $input->isStrictRead());
    }
    else
    {
      $args = new \Xin\Thrift\MonitorService\Github_userProfile_args();
      $args->read($input);
      $input->readMessageEnd();
    }
    $result = new \Xin\Thrift\MonitorService\Github_userProfile_result();
    try {
      $result->success = $this->handler_->userProfile($args->username, $args->token);
    } catch (\Xin\Thrift\MonitorService\ThriftException $ex) {
      $result->ex = $ex;
    }
    $bin_accel = ($output instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($output, 'userProfile', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
    }
    else
    {
      $output->writeMessageBegin('userProfile', TMessageType::REPLY, $seqid);
      $result->write($output);
      $output->writeMessageEnd();
      $output->getTransport()->flush();
    }
  }
}
