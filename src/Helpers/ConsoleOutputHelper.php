<?php

namespace fortrabbit\Copy\Helpers;

use fortrabbit\Copy\Plugin;
use Symfony\Component\Console\Helper\TableSeparator;

/**
 * Trait ConsoleOutputHelper
 *
 * @package fortrabbit\Copy\services
 *
 * @property string  $app
 * @property boolean $dryRun
 */
trait ConsoleOutputHelper
{
    public function rsyncInfo(string $dir, string $remoteUrl = null, string $volumeHandle = null)
    {
        $rows = [
            ['Directory', $dir],
            new TableSeparator(),
            ['SSH remote', $remoteUrl],
            new TableSeparator(),
            ['Dry run', $this->dryRun ? 'true' : 'false']
        ];

        if ($volumeHandle) {
            $rows[] =  new TableSeparator();
            $rows[] =  ['Volume', $volumeHandle];
        }

        $this->table(
            ['Key', 'Value'],
            $rows
        );
    }

    /**
     * Command line block
     *
     * @param string $cmd
     *
     * @return bool
     */
    public function cmdBlock(string $cmd)
    {
        $here = str_replace(getenv("HOME"), '~', getcwd());
        $this->block($cmd, null, 'fg=white;bg=default', '<comment> ' . $here . ' ►  </comment>', false, false);
        return true;
    }

    /**
     * @param string      $message
     * @param string|null $context
     * @param bool        $clear
     */
    public function head(string $message, string $context = null, $clear = true)
    {
        if ($clear) {
            $this->output->write(sprintf("\033\143"));
        }

        $this->block("<options=bold;fg=white>$message</>", $context, 'fg=white;', '▶ ', false, false);
    }
}
