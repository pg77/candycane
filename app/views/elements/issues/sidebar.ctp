<h3><?php __('Issues') ?></h3>
<?php echo $html->link(__('View all issues', true), am(isset($main_project) && $main_project ? array('project_id' => $main_project['Project']['identifier']) : a(), array('controller' => 'issues', 'action' => 'index', '?'=>array('set_filter'=>1)))) ?><br />
<!--<%= link_to l(:label_issue_view_all), { :controller => 'issues', :action => 'index', :project_id => @project, :set_filter => 1 } %><br />-->
<?php if (isset($main_project) && $main_project): ?>
<?php echo $html->link(__('Summary', true), am(isset($main_project) && $main_project ? array('project_id' => $main_project['Project']['identifier']) : a(), array('controller' => 'reports', 'action' => 'issue_report'))) ?><br />
<?php echo $html->link(__('Change log', true), am(isset($main_project) && $main_project ? array('id' => $main_project['Project']['identifier']) : a(), array('controller' => 'projects', 'action' => 'changelog'))) ?><br />
<!--
<%= link_to l(:field_summary), :controller => 'reports', :action => 'issue_report', :id => @project %><br />
<%= link_to l(:label_change_log), :controller => 'projects', :action => 'changelog', :id => @project %><br />
-->
<?php endif ?>
<!--
<%= call_hook(:view_issues_sidebar_issues_bottom) %>

<% planning_links = []
  planning_links << link_to(l(:label_calendar), :action => 'calendar', :project_id => @project) if User.current.allowed_to?(:view_calendar, @project, :global => true)
  planning_links << link_to(l(:label_gantt), :action => 'gantt', :project_id => @project) if User.current.allowed_to?(:view_gantt, @project, :global => true)
%>
<% unless planning_links.empty? %>
-->
<h3><?php __('Planning') ?></h3>
<!--
<p><%= planning_links.join(' | ') %></p>
<%= call_hook(:view_issues_sidebar_planning_bottom) %>
<% end %>
<% unless sidebar_queries.empty? -%>
-->
<h3><?php __('Custom queries') ?></h3>
<?php foreach($sidebar_queries as $query): ?>
<?php
	if(isset($main_project)) {
		echo $html->link(h($query['Query']['name']), array('controller' => 'issues', 'action' => 'index', 'project_id' => $main_project['Project']['identifier'], '?'=>array('query_id' => $query['Query']['id'])));
		echo '<br />';
	} elseif(empty($query['Query']['project_id'])) {
		echo $html->link(h($query['Query']['name']), array('controller' => 'issues', 'action' => 'index', '?'=>array('query_id' => $query['Query']['id'])));
		echo '<br />';
	}
?>
<?php endforeach; ?>
