<?php

namespace Dayofr\Responses;

use Dayofr\Responses\Limits\ApiRequests;
use Dayofr\Responses\Limits\MaxRemaining;

class LimitsResult
{
    private MaxRemaining $analyticsExternalDataSizeMB;
    private MaxRemaining $concurrentAsyncGetReportInstances;
    private MaxRemaining $concurrentEinsteinDataInsightsStoryCreation;
    private MaxRemaining $concurrentEinsteinDiscoveryStoryCreation;
    private MaxRemaining $concurrentSyncReportRuns;
    private MaxRemaining $dailyAnalyticsDataflowJobExecutions;
    private MaxRemaining $dailyAnalyticsUploadedFilesSizeMB;
    private ApiRequests $dailyApiRequests;
    private MaxRemaining $dailyAsyncApexExecutions;
    private MaxRemaining $dailyBulkApiRequests;
    private MaxRemaining $dailyBulkV2QueryFileStorageMB;
    private MaxRemaining $dailyBulkV2QueryJobs;
    private MaxRemaining $dailyDurableGenericStreamingApiEvents;
    private MaxRemaining $dailyDurableStreamingApiEvents;
    private MaxRemaining $dailyEinsteinDataInsightsStoryCreation;
    private MaxRemaining $dailyEinsteinDiscoveryPredictAPICalls;
    private MaxRemaining $dailyEinsteinDiscoveryPredictionsByCDC;
    private MaxRemaining $dailyEinsteinDiscoveryStoryCreation;
    private ApiRequests $dailyGenericStreamingApiEvents;
    private MaxRemaining $dailyStandardVolumePlatformEvents;
    private ApiRequests $dailyStreamingApiEvents;
    private MaxRemaining $dailyWorkflowEmails;
    private MaxRemaining $dataStorageMB;
    private MaxRemaining $durableStreamingApiConcurrentClients;
    private MaxRemaining $fileStorageMB;
    private MaxRemaining $hourlyAsyncReportRuns;
    private MaxRemaining $hourlyDashboardRefreshes;
    private MaxRemaining $hourlyDashboardResults;
    private MaxRemaining $hourlyDashboardStatuses;
    private MaxRemaining $hourlyLongTermIdMapping;
    private MaxRemaining $hourlyODataCallout;
    private MaxRemaining $hourlyPublishedPlatformEvents;
    private MaxRemaining $hourlyPublishedStandardVolumePlatformEvents;
    private MaxRemaining $hourlyShortTermIdMapping;
    private MaxRemaining $hourlySyncReportRuns;
    private MaxRemaining $hourlyTimeBasedWorkflow;
    private MaxRemaining $massEmail;
    private MaxRemaining $monthlyEinsteinDiscoveryStoryCreation;
    private MaxRemaining $monthlyPlatformEventsUsageEntitlement;
    private MaxRemaining $package2VersionCreates;
    private MaxRemaining $package2VersionCreatesWithoutValidation;
    private MaxRemaining $permissionSets;
    private MaxRemaining $singleEmail;
    private MaxRemaining $streamingApiConcurrentClients;

    public function __construct(string $response)
    {
        $res = json_decode($response);
        $this->analyticsExternalDataSizeMB = new MaxRemaining($res->AnalyticsExternalDataSizeMB);
        $this->concurrentAsyncGetReportInstances = new MaxRemaining($res->ConcurrentAsyncGetReportInstances);
        $this->concurrentEinsteinDataInsightsStoryCreation = new MaxRemaining($res->ConcurrentEinsteinDataInsightsStoryCreation);
        $this->concurrentEinsteinDiscoveryStoryCreation = new MaxRemaining($res->ConcurrentEinsteinDiscoveryStoryCreation);
        $this->concurrentSyncReportRuns = new MaxRemaining($res->ConcurrentSyncReportRuns);
        $this->dailyAnalyticsDataflowJobExecutions = new MaxRemaining($res->DailyAnalyticsDataflowJobExecutions);
        $this->dailyAnalyticsUploadedFilesSizeMB = new MaxRemaining($res->DailyAnalyticsUploadedFilesSizeMB);
        $this->dailyApiRequests = new ApiRequests($res->DailyApiRequests);
        $this->dailyAsyncApexExecutions = new MaxRemaining($res->DailyAsyncApexExecutions);
        $this->dailyBulkApiRequests = new MaxRemaining($res->DailyBulkApiRequests);
        $this->dailyBulkV2QueryFileStorageMB = new MaxRemaining($res->DailyBulkV2QueryFileStorageMB);
        $this->dailyBulkV2QueryJobs = new MaxRemaining($res->DailyBulkV2QueryJobs);
        $this->dailyDurableGenericStreamingApiEvents = new MaxRemaining($res->DailyDurableGenericStreamingApiEvents);
        $this->dailyDurableStreamingApiEvents = new MaxRemaining($res->DailyDurableStreamingApiEvents);
        $this->dailyEinsteinDataInsightsStoryCreation = new MaxRemaining($res->DailyEinsteinDataInsightsStoryCreation);
        $this->dailyEinsteinDiscoveryPredictAPICalls = new MaxRemaining($res->DailyEinsteinDiscoveryPredictAPICalls);
        $this->dailyEinsteinDiscoveryPredictionsByCDC = new MaxRemaining($res->DailyEinsteinDiscoveryPredictionsByCDC);
        $this->dailyEinsteinDiscoveryStoryCreation = new MaxRemaining($res->DailyEinsteinDiscoveryStoryCreation);
        $this->dailyGenericStreamingApiEvents = new ApiRequests($res->DailyGenericStreamingApiEvents);
        $this->dailyStandardVolumePlatformEvents = new MaxRemaining($res->DailyStandardVolumePlatformEvents);
        $this->dailyStreamingApiEvents = new ApiRequests($res->DailyStreamingApiEvents);
        $this->dailyWorkflowEmails = new MaxRemaining($res->DailyWorkflowEmails);
        $this->dataStorageMB = new MaxRemaining($res->DataStorageMB);
        $this->durableStreamingApiConcurrentClients = new MaxRemaining($res->DurableStreamingApiConcurrentClients);
        $this->fileStorageMB = new MaxRemaining($res->FileStorageMB);
        $this->hourlyAsyncReportRuns = new MaxRemaining($res->HourlyAsyncReportRuns);
        $this->hourlyDashboardRefreshes = new MaxRemaining($res->HourlyDashboardRefreshes);
        $this->hourlyDashboardResults = new MaxRemaining($res->HourlyDashboardResults);
        $this->hourlyDashboardStatuses = new MaxRemaining($res->HourlyDashboardStatuses);
        $this->hourlyLongTermIdMapping = new MaxRemaining($res->HourlyLongTermIdMapping);
        $this->hourlyODataCallout = new MaxRemaining($res->HourlyODataCallout);
        $this->hourlyPublishedPlatformEvents = new MaxRemaining($res->HourlyPublishedPlatformEvents);
        $this->hourlyPublishedStandardVolumePlatformEvents = new MaxRemaining($res->HourlyPublishedStandardVolumePlatformEvents);
        $this->hourlyShortTermIdMapping = new MaxRemaining($res->HourlyShortTermIdMapping);
        $this->hourlySyncReportRuns = new MaxRemaining($res->HourlySyncReportRuns);
        $this->hourlyTimeBasedWorkflow = new MaxRemaining($res->HourlyTimeBasedWorkflow);
        $this->massEmail = new MaxRemaining($res->MassEmail);
        $this->monthlyEinsteinDiscoveryStoryCreation = new MaxRemaining($res->MonthlyEinsteinDiscoveryStoryCreation);
        $this->monthlyPlatformEventsUsageEntitlement = new MaxRemaining($res->MonthlyPlatformEventsUsageEntitlement);
        $this->package2VersionCreates = new MaxRemaining($res->Package2VersionCreates);
        $this->package2VersionCreatesWithoutValidation = new MaxRemaining($res->Package2VersionCreatesWithoutValidation);
        $this->permissionSets = new MaxRemaining($res->PermissionSets);
        $this->singleEmail = new MaxRemaining($res->SingleEmail);
        $this->streamingApiConcurrentClients = new MaxRemaining($res->StreamingApiConcurrentClients);
    }

    
    public function getAnalyticsExternalDataSizeMB(): MaxRemaining
    {
        return $this->analyticsExternalDataSizeMB;
    }

    
    public function getConcurrentAsyncGetReportInstances(): MaxRemaining
    {
        return $this->concurrentAsyncGetReportInstances;
    }

    
    public function getConcurrentEinsteinDataInsightsStoryCreation(): MaxRemaining
    {
        return $this->concurrentEinsteinDataInsightsStoryCreation;
    }

    
    public function getConcurrentEinsteinDiscoveryStoryCreation(): MaxRemaining
    {
        return $this->concurrentEinsteinDiscoveryStoryCreation;
    }

    
    public function getConcurrentSyncReportRuns(): MaxRemaining
    {
        return $this->concurrentSyncReportRuns;
    }

    
    public function getDailyAnalyticsDataflowJobExecutions(): MaxRemaining
    {
        return $this->dailyAnalyticsDataflowJobExecutions;
    }

    
    public function getDailyAnalyticsUploadedFilesSizeMB(): MaxRemaining
    {
        return $this->dailyAnalyticsUploadedFilesSizeMB;
    }

    
    public function getDailyApiRequests(): ApiRequests
    {
        return $this->dailyApiRequests;
    }

    
    public function getDailyAsyncApexExecutions(): MaxRemaining
    {
        return $this->dailyAsyncApexExecutions;
    }

    
    public function getDailyBulkApiRequests(): MaxRemaining
    {
        return $this->dailyBulkApiRequests;
    }

    
    public function getDailyBulkV2QueryFileStorageMB(): MaxRemaining
    {
        return $this->dailyBulkV2QueryFileStorageMB;
    }

    
    public function getDailyBulkV2QueryJobs(): MaxRemaining
    {
        return $this->dailyBulkV2QueryJobs;
    }

    
    public function getDailyDurableGenericStreamingApiEvents(): MaxRemaining
    {
        return $this->dailyDurableGenericStreamingApiEvents;
    }

    
    public function getDailyDurableStreamingApiEvents(): MaxRemaining
    {
        return $this->dailyDurableStreamingApiEvents;
    }

    
    public function getDailyEinsteinDataInsightsStoryCreation(): MaxRemaining
    {
        return $this->dailyEinsteinDataInsightsStoryCreation;
    }

    
    public function getDailyEinsteinDiscoveryPredictAPICalls(): MaxRemaining
    {
        return $this->dailyEinsteinDiscoveryPredictAPICalls;
    }

    
    public function getDailyEinsteinDiscoveryPredictionsByCDC(): MaxRemaining
    {
        return $this->dailyEinsteinDiscoveryPredictionsByCDC;
    }

    
    public function getDailyEinsteinDiscoveryStoryCreation(): MaxRemaining
    {
        return $this->dailyEinsteinDiscoveryStoryCreation;
    }

    
    public function getDailyGenericStreamingApiEvents(): ApiRequests
    {
        return $this->dailyGenericStreamingApiEvents;
    }

    
    public function getDailyStandardVolumePlatformEvents(): MaxRemaining
    {
        return $this->dailyStandardVolumePlatformEvents;
    }

    
    public function getDailyStreamingApiEvents(): ApiRequests
    {
        return $this->dailyStreamingApiEvents;
    }

    
    public function getDailyWorkflowEmails(): MaxRemaining
    {
        return $this->dailyWorkflowEmails;
    }

    
    public function getDataStorageMB(): MaxRemaining
    {
        return $this->dataStorageMB;
    }

    
    public function getDurableStreamingApiConcurrentClients(): MaxRemaining
    {
        return $this->durableStreamingApiConcurrentClients;
    }

    
    public function getFileStorageMB(): MaxRemaining
    {
        return $this->fileStorageMB;
    }

    
    public function getHourlyAsyncReportRuns(): MaxRemaining
    {
        return $this->hourlyAsyncReportRuns;
    }

    
    public function getHourlyDashboardRefreshes(): MaxRemaining
    {
        return $this->hourlyDashboardRefreshes;
    }

    
    public function getHourlyDashboardResults(): MaxRemaining
    {
        return $this->hourlyDashboardResults;
    }

    
    public function getHourlyDashboardStatuses(): MaxRemaining
    {
        return $this->hourlyDashboardStatuses;
    }

    
    public function getHourlyLongTermIdMapping(): MaxRemaining
    {
        return $this->hourlyLongTermIdMapping;
    }

    
    public function getHourlyODataCallout(): MaxRemaining
    {
        return $this->hourlyODataCallout;
    }

    
    public function getHourlyPublishedPlatformEvents(): MaxRemaining
    {
        return $this->hourlyPublishedPlatformEvents;
    }

    
    public function getHourlyPublishedStandardVolumePlatformEvents(): MaxRemaining
    {
        return $this->hourlyPublishedStandardVolumePlatformEvents;
    }

    
    public function getHourlyShortTermIdMapping(): MaxRemaining
    {
        return $this->hourlyShortTermIdMapping;
    }

    
    public function getHourlySyncReportRuns(): MaxRemaining
    {
        return $this->hourlySyncReportRuns;
    }

    
    public function getHourlyTimeBasedWorkflow(): MaxRemaining
    {
        return $this->hourlyTimeBasedWorkflow;
    }

    
    public function getMassEmail(): MaxRemaining
    {
        return $this->massEmail;
    }

    
    public function getMonthlyEinsteinDiscoveryStoryCreation(): MaxRemaining
    {
        return $this->monthlyEinsteinDiscoveryStoryCreation;
    }

    
    public function getMonthlyPlatformEventsUsageEntitlement(): MaxRemaining
    {
        return $this->monthlyPlatformEventsUsageEntitlement;
    }

    
    public function getPackage2VersionCreates(): MaxRemaining
    {
        return $this->package2VersionCreates;
    }

    
    public function getPackage2VersionCreatesWithoutValidation(): MaxRemaining
    {
        return $this->package2VersionCreatesWithoutValidation;
    }

    
    public function getPermissionSets(): MaxRemaining
    {
        return $this->permissionSets;
    }

    public function getSingleEmail(): MaxRemaining
    {
        return $this->singleEmail;
    }
    
    public function getStreamingApiConcurrentClients(): MaxRemaining
    {
        return $this->streamingApiConcurrentClients;
    }
}
