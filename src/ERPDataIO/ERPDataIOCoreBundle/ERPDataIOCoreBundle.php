<?php

/**
 * ERPDataIOCoreBundle for Elcodi
 *
 * This Bundle is part of ERPDataIO bridge for Elcodi
 *
 * @author Arkaitz Garro <arkaitz.garro@gmail.com>
 * @package ERPDataIOCoreBundle
 *
 * Arkaitz Garro 2014
 */

namespace ERPDataIO\ERPDataIOCoreBundle;

/**
 * This class define all events thrown by all import/export methods
 */
class ERPDataIOCoreEvents
{
    /**
     * This event is thrown when data import starts
     *
     * event.name : erpdataio.import.start
     * event.class : ERPDataIOImportStartEvent
     */
    const ERPDATAIO_IMPORT_START = 'erpdataio.import.start';

    /**
     * This event is thrown when data import ends
     *
     * event.name : erpdataio.import.end
     * event.class : ERPDataIOImportEndEvent
     */
    const ERPDATAIO_IMPORT_END = 'erpdataio.import.end';

    /**
     * This event is thrown when data import fails for any reason
     *
     * event.name : erpdataio.import.fail
     * event.class : ERPDataIOImportFailEvent
     */
    const ERPDATAIO_IMPORT_FAIL = 'erpdataio.import.fail';

    /**
     * This event is thrown when data import ends
     *
     * event.name : erpdataio.import.end
     * event.class : ERPDataIOImportStartEvent
     */
    const ERPDATAIO_IMPORT_START = 'erpdataio.import.start';

    /**
     * This event is thrown when data import ends
     *
     * event.name : erpdataio.import.end
     * event.class : ERPDataIOImportEndEvent
     */
    const ERPDATAIO_IMPORT_END = 'erpdataio.import.end';

    /**
     * This event is thrown when data import fails for any reason
     *
     * event.name : erpdataio.import.fail
     * event.class : ERPDataIOImportFailEvent
     */
    const ERPDATAIO_IMPORT_FAIL = 'erpdataio.import.fail';
}