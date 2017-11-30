<?php 
	function runApplication() {

		/// header("Expires: " . gmdate("D, d M Y H:i:s", strtotime("+1 day")) ." GMT");

		$includePageContent = null;
		$mainTemplate = "template/template.php";
		$errorTemplate = "content/content.error.php";
		$host = $_SERVER["HTTP_HOST"];
		$request = strtolower($_SERVER["REQUEST_URI"]);

		$q = getQ();

		if ($_SERVER["REMOTE_ADDR"] == "46.39.240.49") {
			// print "<pre>";
			// print "<br><br>Folder: ";
			// print getContentFolderOnServer() . "/" . 'titles.page' . getExtensionFile();
			// print "</pre>";
		}


		if ($path = getPagePath($q)) {
			$includePageContent = $path;
		} else {
			header('HTTP/1.0 404 Not Found');
			header('HTTP/1.1 404 Not Found');
			header('Status: 404 Not Found');
			$includePageContent = $errorTemplate;
			$q = "error";
		}

		// ������� ��������� ��������
		$headerTitle = getPageHeader($q);

		// �������� ������� ��������
		$content = ob_include($includePageContent);
		// ���������� ������� ������
		include_once($mainTemplate);
		// include_once($includePageContent);
	}

	function getQ() {

		if (isset($_GET['q']) && !empty($_GET['q'])) {
			$q = strtolower($_GET['q']);

			// ������� 301 �������� ���� �� ����� � ��� ���� "/"
			if (substr(strrev($q), 0, 1) == "/") {
				$request = rtrim($request, "/");
				header("HTTP/1.1 301 Moved Permanently"); 
				header("Location: http://".$host.$request); 
				exit();
			}
		} else {
			$q = "index";
		}

		return $q;
	}

	function ob_include($file) {
		if (file_exists($file)) {
			ob_start();
			include_once($file);
			$file_content = ob_get_contents();
			ob_end_clean();
			return $file_content;
		}
		return false;
	}

	//Helper prepare and send alarm mail
	function sendErrorMail($answer) {
		$toError = "lobkovs@yandex.ru";
		$subjectError = "SEND ERROR!!! " . $_SERVER["HTTP_HOST"];
		$textError = getTextErrorMail($answer);
		$headersError = "Content-type: text/html; charset=utf-8\r\n";
		$headersError .= "From: INFO SNB.RU <info@sn-b.ru>\r\n";
		mail($toError, $subjectError, $textError, $headersError);
	}

	//Helper function pack message
	function getTextErrorMail($answer) {

		$output .= prepareTextErrorArray(array($answer), "Answer");
		$output .= prepareTextErrorArray($_POST, 'POST');
		$output .= prepareTextErrorArray($_SESSION, "SESSION");
		$output .= prepareTextErrorArray($_SERVER, "SERVER");

		return $output;
	}

	//Helper function step to array
	function prepareTextErrorArray(array $ar, $name) {
		$output = "<b>" . $name . "</b><br><br>";

		if (!$ar) {
			return $output . " is null array<br><br>";
		}

		foreach ($ar as $key => $value) {
			$temp[] = "<i>" . $key . ":</i> " . $value;
		}

		$output .= implode("; <br>", $temp) . "<br><br>";

		return $output;
	}

	function getPageHeader($path) {
		$defaultTitle = "����� SNB";
		// ���������� ������ ����������� �������
		include_once(getContentFolderOnServer() . "/" . 'titles.page' . getExtensionFile());
		// ���������� ���������
		return isset($titles[$path]) ? $titles[$path].' | '.$defaultTitle : $defaultTitle;
	}

	function getContentFolderOnServer() {
		return "content";
	}

	function getExtensionFile() {
		return ".php";
	}

	// ���������� ���������� ���� ��������
	function getPagePath($q) {

		// ��������� ��������
		$contentPath = getContentFolderOnServer();
		$filePHP = getExtensionFile();
		$prefixContentFile = "content.";

		// ������������ ����
		$separateQ = explode("/", $q);

		// ����� ������� ������� ���� � ���������� ����� �� ������� "content"
		array_unshift($separateQ, $contentPath);

		// ��������� ���-�� ���������
		$countPath = count($separateQ);

		// ������ ���������� �������� �������
		$index = $countPath - 1;

		if ($countPath > 2) {
			// ���� ���� ������������, �.�. ������ ���� ���������, ���� ������ ��� �� ������� ��������� ���� �� ����� "content",
			// ����� ������ ����� ��������� �������, ������� ������� � ���������� � �������� �� ������������
			$separateQ[$index] = $prefixContentFile . $separateQ[$index] . $filePHP;
			$tempPath = implode("/", $separateQ);
			if (file_exists($tempPath))
				return $tempPath;

		} else {
			// ����� �������� �� ������������ ���� ����� �� �����, �������� ��������
			$tempPath = $contentPath . "/" . $prefixContentFile . $q . $filePHP;

			if (file_exists($tempPath)) {
				return $tempPath;
			} else {
				// ���� ���, ����� ��� ����� � �� ������� ��������� ��������� ���� � ����� � �������� ����
				$separateQ[] = $prefixContentFile . "index" . $filePHP;
				$tempPath = implode("/", $separateQ);
				if (file_exists($tempPath))
					return $tempPath;
			}
		}
		// �� � ���� ������ �� ������� ����� ����� false
		return false;
	}

	function getBlocks($region, $check = false) {

		$directoryRoot = "blocks";
		$blocksPath = $directoryRoot . "/" . $region;
		$blockContent = "";
		$q = getQ();

		if (!file_exists($blocksPath)) {
			printError("������ $region, �� ������!");
			return false;
		}

		$blocksFolders = scandir($blocksPath);

		foreach ($blocksFolders as $folder) {

			if ($folder == "." || $folder == "..")
				continue;

			$match = false;

			$settingsFile = "settings." . $folder . getExtensionFile();
			$settingsPath = $blocksPath . "/" . $folder . "/" . $settingsFile;

			$contentFile = "content." . $folder . getExtensionFile();
			$contentPath = $blocksPath . "/" . $folder . "/" . $contentFile;

			if (file_exists($settingsPath)) {
				include_once($settingsPath);
			} else {
				printError("��������� ����� $folder �� �������!");
				continue;
			}

			$settingsFuncShow = str_replace("-", "_", "show_" . $region . "_" . $folder);

			if (function_exists($settingsFuncShow)) {
				$arShow = call_user_func($settingsFuncShow);

				if (count($arShow) > 0 || is_array($arShow)) {

					$type = array_shift($arShow);

					switch ($type) {
						case "allow":
							if (doMatch($arShow, $q)) {
								$match = true;
							} else {
								$match = false;
							}
							break;
						case "deny":
							if (doMatch($arShow, $q)) {
								$match = false;
							} else {
								$match = true;
							}
							break;
					}
				} else {
					printError("������ ����������� ����� ���� ��� ���� ����� �� �������!");
				}
			}

			if ($match) {
				if ($check) {
					return true;
				} else {
					print ob_include($contentPath);
				}
			}
		}
	}

	function checkBlocks($region) {
		return getBlocks($region, true);
	}

	function prt($v) {
		print "<pre>";
		print_r($v);
		print "</pre><br>";
	}

	function doMatch($paths, $q) {

		foreach ($paths as $path) {

			if (matchPath($q, $path)) {
				return true;
			}
		}
		return false;
	}

	function printError($text) {
		print "<div style=\"display:none;\">$text</div>";
	}

	function matchPath($path, $patterns) {
		// Convert path settings to a regular expression.
		$to_replace = array(
			// Replace newlines with a logical 'or'.
			'/(\r\n?|\n)/',
			// Quote asterisks.
			'/\\\\\*/',
			// Quote <front> keyword.
			'/(^|\|)\\\\<front\\\\>($|\|)/',
		);
		$replacements = array(
			'|',
			'.*',
			'\1' . preg_quote("index", '/') . '\2',
		);
		$patterns_quoted = preg_quote($patterns, '/');
		$p = '/^(' . preg_replace($to_replace, $replacements, $patterns_quoted) . ')$/';

		return preg_match($p, $path);
	}
?>