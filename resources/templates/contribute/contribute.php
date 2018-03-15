@extends('layout.master')

<div class="container">
  <section id="bugs" class="doc-section">
    <h4>Bug Reports</h4>
    <p>To encourage active collaboration, Zefire strongly encourages pull requests, not just bug reports. "Bug reports" may also be sent in the form of a pull request.</p>
    <p>However, if you file a bug report, your issue should contain a title and a clear description of the issue. You should also include as much relevant information as possible and a code sample that demonstrates the issue. The goal of a bug report is to make it easy for yourself - and others - to replicate the bug and develop a fix.</p>
    <p>Remember, bug reports are created in the hope that others with the same problem will be able to collaborate with you on solving it. Do not expect that the bug report will automatically see any activity or that others will jump to fix it. Creating a bug report serves to help yourself and others start on the path of fixing the problem.</p>
  </section>

  <section id="framework" class="doc-section">
    <h4>Framework Development</h4>
    <p>You may propose new features or improvements of existing Zefire behavior in the Zefire issue board. If you propose a new feature, please be willing to implement at least some of the code that would be needed to complete the feature.</p>
  </section>

  <section id="security" class="doc-section">
    <h4>Security Vulnerabilities</h4>
    <p>If you discover a security vulnerability within Zefire, please send an email to <a href="mailto:zefireframework@gmail.com">Zefire</a>. All security vulnerabilities will be promptly addressed.</p>
  </section>

  <section id="coding" class="doc-section">
    <h4>Coding Style</h4>
    <p>Zefire follows the <code>PSR-2</code> coding standard and the <code>PSR-4</code> autoloading standard.</p>
    <p>Below is an example of a valid Zefire documentation block. Note that the @param attribute is followed by two spaces, the argument type, one more space, and finally the variable name:</p>
    <div class="code-block">
      @code('php')
/**
 * Registers a new alias for a given service.
 *
 * @param  string $name
 * @param  string $class
 * @return void
 */
public function alias($name, $class)
{
    //
}
      @endcode
    </div>
  </section>
</div>
<script>hljs.initHighlightingOnLoad();</script>