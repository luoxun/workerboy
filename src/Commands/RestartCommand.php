<?php namespace zgldh\workerboy\Commands;

/**
 * Created by PhpStorm.
 * User: zgldh
 * Date: 2015/4/11
 * Time: 21:29
 */


use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Workerman\Worker;

class RestartCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'workerboy:restart';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Restart workerman';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		//
		$deamon_mode = $this->option('deamon');
		global $argv;
		$argv[0] = 'artisan';
		$argv[1] = 'restart';
		$argv[2] = $deamon_mode? '-d' :null;

		Worker::runAll();
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
			['deamon', null, InputOption::VALUE_OPTIONAL, 'Deamon mode.', true],
		];
	}

}
