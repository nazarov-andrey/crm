<?php
	namespace ru\nazarov\sitebase\core;

    class Uploader extends Dependent implements IDependent {
		const INJECTION_REQUEST = 'uploader_injection_request';

        protected  $_path;

        public function __construct($path) {
            $this->_path = $path;
        }

		protected function request() {
			return $this->getInjection(self::INJECTION_REQUEST);
		}
        
        public function upload($tmpName, $srcName = NULL) {
            $dst = $this->request()->getValue('DOCUMENT_ROOT') . $this->_path . '/';
            
            if ($srcName != null) {
                $filename = $srcName;
            }
            else {
                do {
                    $filename = sha1(rand());
                } while (file_exists($dst . $filename));
            }
            
            if (!move_uploaded_file($tmpName, $dst . $filename)) {
                throw new \ru\nazarov\sitebase\core\exceptions\SitebaseException('File uploading error');
            }
            
            return $this->_path . '/' . $filename;
        }
        
        public static function create($path) {
            return new self($path);
        }
    }
?>
