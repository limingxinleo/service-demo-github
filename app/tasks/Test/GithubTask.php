<?php

namespace App\Tasks\Test;

use App\Biz\Github\Events;
use App\Biz\Github\Commits;
use App\Biz\Github\Follow;
use App\Biz\Github\Release;
use App\Jobs\GithubReleaseEventJob;
use App\Tasks\Task;
use App\Thrift\Clients\GithubClient;
use App\Utils\Queue;

class GithubTask extends Task
{
    public function commitsAction()
    {
        $client = GithubClient::getInstance();
        $client->commits('limingxinleo', env('RECEIVED_EVENTS_TOKEN'));
    }

    public function eventsAction()
    {
        $client = GithubClient::getInstance();
        $client->receivedEvents('limingxinleo', env('RECEIVED_EVENTS_TOKEN'));
    }

    public function commitsLogAction()
    {
        $client = GithubClient::getInstance();
        $btime = time() - 24 * 3600;
        $etime = time();
        $res = $client->commitsLog('limingxinleo', $btime, $etime);
        dd($res);
    }

    public function searchAction()
    {
        $committer = 'limingxinleo';
        $date = date('Y-m-d');
        $token = env('RECEIVED_EVENTS_TOKEN');
        $res = Commits::search($committer, $date, $token);
        dd($res);
    }

    public function countAction()
    {
        $committer = 'limingxinleo';
        $date = date('Y-m-d');
        $token = env('RECEIVED_EVENTS_TOKEN');
        $res = Commits::count($committer, $date, $token);
        dd($res);
    }

    public function sendCommitsAction()
    {
        $committer = 'limingxinleo';
        $token = env('RECEIVED_EVENTS_TOKEN');
        $res = Commits::send($committer, $token);
        dd($res);
    }

    public function receivedAction()
    {
        $token = env('RECEIVED_EVENTS_TOKEN');
        $committer = 'limingxinleo';
        $res = Events::sendReceivedEvent($committer, $token);
        dd($res);
    }

    public function followersAction()
    {
        $committer = 'laruence';
        $res = Follow::followers($committer);
        // $res = Follow::getFollowers($committer)->toArray();
        dd($res);
    }


    public function followingAction()
    {
        $committer = 'limingxinleo';
        $res = Follow::following($committer);
        // $res = Follow::getFollowers($committer)->toArray();
        dd($res);
    }

    public function profileAction()
    {
        $username = 'limingxinleo';
        $token = env('RECEIVED_EVENTS_TOKEN');

        // $res = User::profile($username, $token);

        $client = GithubClient::getInstance(['port' => 52100]);
        $res = $client->userProfile($username, $token);

        dd($res);
    }

    public function releaseAction()
    {
        $repos = [
            ['owner' => 'limingxinleo', 'repo' => 'phalcon'],
            ['owner' => 'limingxinleo', 'repo' => 'phalcon-thrift-project'],
            ['owner' => 'limingxinleo', 'repo' => 'laravel-thrift-project'],
            ['owner' => 'phalcon', 'repo' => 'cphalcon'],
            ['owner' => 'apache', 'repo' => 'thrift'],
        ];

        foreach ($repos as $item) {
            Queue::push(new GithubReleaseEventJob($item['owner'], $item['repo']));
        }
    }
}
